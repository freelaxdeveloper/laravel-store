<?php

namespace App;

use Baum\Node;
use App\Product;

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
            $model->slug = str_slug($model->name);
        });
    }
}
