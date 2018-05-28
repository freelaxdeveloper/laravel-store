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
            'price_old.integer' => 'Старая цена должна быть числовым значением',
        ];
        
        Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'price' => 'required|integer',
            'price_old' => 'nullable|integer',
            'categories.*' => 'integer|exists:categories,id',
        ], $messages)->validate();

        $product = new Product;
        
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->meta_description = $request->input('meta_description');
        $product->price_old = $request->input('price_old');
        $product->save();

        $product->categories()->attach($request->input('categories'));

        return redirect(route('prod.view', $product));
    }

    public function screen(Product $product)
    {
        return view('product.screen', compact('product'));
    }

    public function screenSave(Request $request, Product $product)
    {
        $this->validate($request, [
            'input_img' => 'required|array|min:1',
            'input_img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('input_img');

        $destinationPath = public_path('/images/products/' . $product->id);

        foreach ( $images as $image ) {
            $image->move($destinationPath, time() . md5(microtime()) . '.' . $image->getClientOriginalExtension());
        }
        
        return redirect(route('prod.screen', $product))->with('status', 'Скриншот загружен');
    }

    public function screenDelete(Product $product, int $screen_id)
    {
        $product->screenDeleteById($screen_id);

        return redirect(route('prod.screen', $product))->with('status', 'Скриншот удален');
    }

    public function view(Product $product)
    {
        $product->with(['categories']);
        $product->increment('views');

        if (Auth::user() && Auth::user()->hasRole('Admin')) {
            $actions = [
                ['link' => route('prod.edit', [$product]), 'title' => 'Изменть'],
                ['link' => route('prod.screen', [$product]), 'title' => 'Фотографии'],
                ['link' => route('prod.delete', [$product]), 'title' => 'Удалить'],
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

    public function delete(Product $product)
    {
        $product->delete();

        return redirect(route('home'));
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'price' => 'nullable|integer',
            'price_old' => 'nullable|integer',
            'categories.*' => 'integer|exists:categories,id',
        ], $messages)->validate();

        // $product->categories()->toggle($request->input('categories'));
        $product->categories()->detach();
        $product->categories()->attach($request->input('categories'));

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->price_old = $request->input('price_old');
        $product->description = $request->input('description');
        $product->meta_description = $request->input('meta_description');
        $product->options = $request->input('options');
        $product->save();

        return redirect(route('prod.view', $product))->with('status', 'Данные сохранены');
    } 
}
