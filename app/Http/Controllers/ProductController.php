<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Product, Category};
use Validator;

class ProductController extends Controller
{
    public function view(Product $product)
    {
        $product->increment('views');

        $categories = Category::roots()->get();
        $products = Product::where('id', '!=', $product->id)->orderBy('id', 'desc')->get()->take(12);

        return view('product.view', compact('products', 'product', 'categories'));
    }

    public function edit(Product $product)
    {
        $categories = $this->categories();
        $productCategories = $product->categories()->pluck('id')->toArray();

        return view('product.edit', compact('categories', 'product', 'productCategories'));
    }

    public function save(Request $request, Product $product)
    {
        $messages = [
            'price.required' => 'Цена обязательна для заполнения',
            'price.integer' => 'Цена должна быть числовым значением',
        ];
        
        Validator::make($request->all(), [
            'type' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'categories.*' => 'integer|exists:categories,id',
        ], $messages)->validate();

        // $product->categories()->toggle($request->input('categories'));
        $product->categories()->detach();
        $product->categories()->attach($request->input('categories'));

        $product->price = $request->input('price');
        $product->type = $request->input('type');
        $product->description = $request->input('description');
        $product->save();

        return back()->with('status', 'Данные сохранены');
    } 
}
