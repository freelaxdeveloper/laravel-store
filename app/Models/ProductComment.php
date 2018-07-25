<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = ['name', 'comment', 'user_id', 'rating', 'info'];
    protected $casts = [
        'info' => 'array',
    ];
}
