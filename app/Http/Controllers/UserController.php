<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function view(User $user)
    {
        return view('users.view', compact('user'));
    }

    public function my()
    {
        return view('users.my');
    }
}
