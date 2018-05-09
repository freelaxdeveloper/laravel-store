<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Category extends Model
{
    protected $table = 'forum_categories';
    protected $guarded = ['id'];

    public function scopeGroup($query)
    {
        return $query->where('group_show', '<=', App::user()->group);
    }
}
