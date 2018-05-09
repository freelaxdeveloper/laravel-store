<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Category, AccountInstagram};

class Product extends Model
{
    public $fillable = ['title', 'options', 'price'];

    public function getScreenAttribute()
    {
        return "/products/{$this->id}.jpg";
    }

    public function getScreenPathAttribute()
    {
        return base_path("public/{$this->screen}");
    }

    public function getRouteKeyName()
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

        $categoryIds = $category->getDescendantsAndSelf()->pluck('id');

        return $query->with('categories')
            ->join('products_categories', 'products_categories.product_id', '=', 'products.id')
            ->whereIn('products_categories.category_id', $categoryIds);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->title);
        });
    }
}
