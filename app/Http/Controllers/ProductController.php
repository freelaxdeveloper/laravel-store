<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Product, Category};

class ProductController extends Controller
{
    public function view(Product $product)
    {
        $categories = Category::roots()->get();
        $products = Product::where('id', '!=', $product->id)->orderBy('id', 'desc')->get()->take(12);

        return view('product.view', compact('products', 'product', 'categories'));
    }
}
