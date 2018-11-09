<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;

class UserController extends Controller
{

    public function userinfo()
    {
        $user = JWTAuth::parseToken()->toUser();

        return $this->success($user);
    }
    
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
