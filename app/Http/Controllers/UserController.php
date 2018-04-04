<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function list()
    {
        $users = User::withCount('chatMessages')->get();
        
        return view('users.list', compact('users'));
    }

    public function view(User $user)
    {
        return view('users.view', compact('user'));
    }
}
