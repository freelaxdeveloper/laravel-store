<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersBase extends Model
{
    protected $fillable = ['phone', 'full_name', 'description'];
}
