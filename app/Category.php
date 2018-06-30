<?php

namespace App;

use Baum\Node;
use App\Product;
use Illuminate\Support\Facades\Cache;
use App\Plugins\Filter;

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
            if ( !$slug ) {
                throw new \ValidateException('Не допустимое значение в названии');
            }
            while (Category::where([['slug', $slug], ['id', '!=', $model->id]])->first()) {
                $slug .= '_' . mt_rand(1111, 9999);
            }
            $model->slug = $slug;
            
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
