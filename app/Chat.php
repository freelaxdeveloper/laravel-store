<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Chat extends Model
{
    protected $fillable = ['user_id', 'message'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
