<?php

namespace App;

use Baum\Node;
use App\Product;
use Illuminate\Support\Facades\Cache;

class Category extends Node
{
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'products_categories');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $slug = str_slug($model->name);
            if (!Category::where('slug', $slug)->first()) {
                $model->slug = $slug;
            } else {
                $model->slug = $slug . '_' . mt_rand(111, 999);
            }
            // очищаем кеш категорий при изменении категории
            Category::cacheClear();
        });
        
        static::creating(function ($model) {
            // очищаем кеш категорий при создании новой категории
            Category::cacheClear();
        });

        static::deleting(function ($model) {
            // очищаем кеш категорий при удалении категории
            Category::cacheClear();
        });
    }

    static function cacheClear()
    {
        return Cache::forget('categories');
    }
}
