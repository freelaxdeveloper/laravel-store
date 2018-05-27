<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Category, AccountInstagram, ProductScreen};
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use File;

class Product extends Model
{
    public $fillable = ['title', 'options', 'price'];

    protected $casts = [
        'options' => 'array',
    ];

    /**
     * список скринов
     */
    public function getScreensAttribute(): Collection
    {
        return (new ProductScreen($this))->all();
    }

    /**
     * удаление скриншота по его ID
     */
    public function screenDeleteById(int $screen_id): bool
    {
        return (new ProductScreen($this))->deleteById($screen_id);
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
            $model->slug = str_slug($model->title);
            while(Product::where([['slug', $model->slug], ['id', '!=', $model->id]])->first()) {
                $model->slug = $model->slug . '_' . mt_rand(111, 999);
            }
            Category::cacheClear();
        });

        static::creating(function ($model) {
            // очищаем кеш категорий при создании новой категории
            Category::cacheClear();
        });

        static::deleting(function ($model) {
            // очищаем кеш категорий при удалении
            Category::cacheClear();
            // удаляем директорию со скриншотами
            File::deleteDirectory((new ProductScreen($model))->getPath());
        });
    }
}
