<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Product};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::roots()->get();
        $products = Product::get();

        return view('home', compact('categories', 'products'));
    }
}
