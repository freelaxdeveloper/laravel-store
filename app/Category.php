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
            $slug = str_slug($model->name);
            if (!Category::where('slug', $slug)->first()) {
                $model->slug = $slug;
            } else {
                $model->slug = $slug . '_' . mt_rand(111, 999);
            }
            
        });
    }
}
