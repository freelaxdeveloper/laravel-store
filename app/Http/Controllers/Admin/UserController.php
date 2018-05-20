<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function list()
    {
        $users = User::withCount('chatMessages')->get();
        
        return view('users.list', compact('users'));
    }
}
