<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Category, AccountInstagram, ProductScreen};
use App\Models\ProductComment;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use File;
use Auth;
use App\Plugins\Filter;
use Carbon\Carbon;

class Product extends Model
{
    public $fillable = ['title', 'options', 'price'];

    protected $casts = [
        'options' => 'array',
    ];

    protected $appends = ['screens', 'screen', 'rating_avg', 'screens_link'];

    public function getRatingAvgAttribute()
    {
        return $this->comments->avg('rating');
    }

    public function getAdminActionsAttribute()
    {
        $actions = [];
        if (Auth::user() && Auth::user()->hasRole('Admin')) {
            $actions = [
                ['link' => route('prod.edit', [$this]), 'title' => 'Изменть'],
                ['link' => route('prod.screen', [$this]), 'title' => 'Фотографии'],
                ['link' => route('prod.delete', [$this]), 'title' => 'Удалить'],
            ];
            }
        return $actions;
    }

    public function comments()
    {
        return $this->hasMany(ProductComment::class)->orderBy('id', 'DESC');
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = abs($value);
    }

    public function setPriceOldAttribute($value)
    {
        $this->attributes['price_old'] = abs($value);
    }

    /**
     * На протяжении 7ми дней считаем что продукт новый
     */
    public function getIsNewAttribute()
    {
        return Carbon::toDay()->addDay(-7) < $this->attributes['created_at'];
    }

    /**
     * список скринов
     */
    public function getScreensAttribute(): Collection
    {
        return (new ProductScreen($this))->all();
    }

    public function getScreensLinkAttribute()
    {
        return $this->screens->pluck('src'); 
    }

    public function getScreenAttribute()
    {
        return $this->screens->sortByDesc('filename')->first();
    }

    /**
     * удаление скриншота по его ID
     */
    public function screenDeleteById(int $screen_id): bool
    {
        return (new ProductScreen($this))->deleteById($screen_id);
    }

    public function screenHightlightById(int $screen_id): bool
    {
        return (new ProductScreen($this))->hightlightById($screen_id);
    }

    /**
     * вычисление скидки, если указана старая цена товара
     */
    public function getDiscountAttribute(): int
    {
        return $this->price_old ? floor(($this->price / $this->price_old * 100) - 100) : 0;
    }

    public function getSizeAttribute(): ?string
    {
        return !empty($this->options['size']['height']) ? implode('/', $this->options['size']) : null;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

    public function instagrams() {
        return $this->belongsToMany(AccountInstagram::class, 'products_instagrams');
    }

    public function scopeCategorized($query, Category $category = null) {
        if (is_null($category))
            return $query->with('categories');

        // продукты в текущей категории, и вложенные в её дочерние категории
        # $categoryIds = $category->getDescendantsAndSelf()->pluck('id');
        // продукты только в текущей категории
        $categoryIds = [$category->id];

        return $query->with('categories')
            ->join('products_categories', 'products_categories.product_id', '=', 'products.id')
            ->whereIn('products_categories.category_id', $categoryIds);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!$model->title) {
                $model->title = mt_rand(1111, 9999);
            }
            $model->slug = str_slug($model->title);
            if ( !$model->slug ) {
                throw new \ValidateException('Не допустимое значение в названии');
            }
            while( Product::where([['slug', $model->slug], ['id', '!=', $model->id]])->first() ) {
                $model->slug = $model->slug . '_' . mt_rand(1111, 9999);
            }
            Category::cacheClear();
        });

        static::creating(function ($model) {
            // очищаем кеш категорий при создании новой категории
            Category::cacheClear();

            if (!$model->title) {
                $model->title = mt_rand(1111, 9999);
            }
        });

        static::deleting(function ($model) {
            // очищаем кеш категорий при удалении
            Category::cacheClear();
            // удаляем директорию со скриншотами
            File::deleteDirectory((new ProductScreen($model))->getPath());
        });
    }
}
