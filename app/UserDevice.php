<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    protected $fillable = ['user_base_id', 'order_id', 'browser', 'platform', 'device', 'info', 'ip'];
   
    protected $casts = [
        'info' => 'array',
    ];
}
