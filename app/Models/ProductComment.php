<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = ['name', 'comment', 'product_id', 'user_id', 'rating', 'info'];
    protected $casts = [
        'info' => 'array',
    ];

    public function getRatingStrAttribute()
    {
        switch ($this->rating) {
            case 0.5 : return 'Ужасно!';
            case 1 : return 'Плохо!';
            case 1.5 : return 'Плохо!';
            case 2 : return 'Так себе!';
            case 2.5 : return 'Так себе!';
            case 3 : return 'Средне!';
            case 3.5 : return 'Нормально!';
            case 4 : return 'Нормально!';
            case 4.5 : return 'Хорошо!';
            case 5 : return 'Отлично!';
        }
    }
}
