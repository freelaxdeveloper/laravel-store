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
        //dd(\Auth::user()->orders);

        return view('users.my');
    }

    public function myOrders()
    {
        return view('users.myOrders');
    }
}
