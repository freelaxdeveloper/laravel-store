<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ForumController extends Controller
{
    public function index()
    {
        dd(Auth::user());
        return view('forum.index');
    }
}
