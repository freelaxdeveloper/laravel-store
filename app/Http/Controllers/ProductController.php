<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Product, Category};
use Validator;
use Auth;

class ProductController extends Controller
{

    public function add(Category $category)
    {
        $categoriesAll = Category::get();
        return view('product.add', compact('category', 'categoriesAll'));
    }

    public function new(Request $request, Category $category)
    {
        $messages = [
            'price.required' => 'Цена обязательна для заполнения',
            'price.integer' => 'Цена должна быть числовым значением',
        ];
        
        Validator::make($request->all(), [
            'title' => 'required|string',
            'type' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'price' => 'required|integer',
            'categories.*' => 'integer|exists:categories,id',
        ], $messages)->validate();

        $product = new Product;
        
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->type = $request->input('type');
        $product->description = $request->input('description');
        $product->meta_description = $request->input('meta_description');
        $product->save();

        $product->categories()->attach($request->input('categories'));

        return back()->with('status', 'Данные сохранены');
    }

    public function view(Product $product)
    {
        $product->with(['categories']);
        $product->increment('views');

        if (Auth::user() && Auth::user()->hasRole('Admin')) {
            $actions = [
                ['link' => route('prod.edit', [$product]), 'title' => 'Изменть'],
                ['link' => '', 'title' => 'Удалить'],
            ];
        }

        $products = Product::with(['categories'])->where('id', '!=', $product->id)->orderBy('id', 'desc')->get()->take(12);

        return view('product.view', compact('products', 'product', 'actions'));
    }

    public function edit(Product $product)
    {
        $categoriesAll = Category::get();
        $productCategories = $product->categories()->pluck('id')->toArray();

        return view('product.edit', compact('categoriesAll', 'product', 'productCategories'));
    }

    public function save(Request $request, Product $product)
    {
        $product->with(['categories']);
        $messages = [
            //'price.required' => 'Цена обязательна для заполнения',
            'price.integer' => 'Цена должна быть числовым значением',
            'price_old.integer' => 'Старая цена должна быть числовым значением',
        ];
        
        Validator::make($request->all(), [
            'type' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'price' => 'nullable|integer',
            'price_old' => 'nullable|integer',
            'categories.*' => 'integer|exists:categories,id',
        ], $messages)->validate();

        // $product->categories()->toggle($request->input('categories'));
        $product->categories()->detach();
        $product->categories()->attach($request->input('categories'));

        $product->price = $request->input('price');
        $product->price_old = $request->input('price_old');
        $product->type = $request->input('type');
        $product->description = $request->input('description');
        $product->meta_description = $request->input('meta_description');
        $product->save();

        return back()->with('status', 'Данные сохранены');
    } 
}
