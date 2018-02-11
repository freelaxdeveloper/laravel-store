<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

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
        # https://github.com/etrepat/baum#creating-root-node
        
        # создаем родительскую категорию
        //$root = Category::create(['name' => 'Игры']);

        # создаем дочерную категорию
        /* $category = Category::find(66);
        $child1 = $category->children()->create(['name' => '2018']); */

        # левел
        /* $category = Category::find(6);
        echo $category->getLevel(); */ // 0 when root

        # breadcrumbs
        //getAncestorsAndSelfWithoutRoot
        /* $categories = Category::find(69);
        foreach ($categories->getAncestorsAndSelf() as $descendant) {
            echo "{$descendant->name}";
        } */
        //$categories = Category::find(2);
        $categories = Category::all()->toHierarchy();
        return view('test', compact('categories'));
    }
}
