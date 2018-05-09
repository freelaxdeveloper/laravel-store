<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Topic extends Model
{
    protected $table = 'forum_topics';
    protected $guarded = ['id'];

}
