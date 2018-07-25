<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Product, Category};
use App\Models\ProductComment;
use Validator;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function screen_test(Request $request, Product $product)
    {
        reset($_FILES);
        $temp = current($_FILES);
        $directoryPath = '/images/products/' . $product->id . '/';
        $destinationPath = $directoryPath . time() . md5(microtime()) . '.jpg';
        \File::makeDirectory(public_path($directoryPath), 0777, true, true);
        move_uploaded_file($temp['tmp_name'], public_path($destinationPath));

        return response()->json(['location' => $product->screen['src']], 200);
        
    }
    public function add(Category $category)
    {
        $categoriesAll = Category::get();

        return view('product.edit', compact('category', 'categoriesAll'));
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
        $actions = $product->adminActions;

        return view('product.screen', compact('product', 'actions'));
    }

    public function screenView(Product $product, int $screen_id, int $width, int $height)
    {
        $resizeWhiteList = ['50x50', '100x100', '150x150', '240x320', '480x640', '320x240'];

        if (!in_array("{$width}x{$height}", $resizeWhiteList)) {
            return response()->json(['success' => 'error'], 403);
        }
        if ( !$screen = $product->screens->where('id', $screen_id)->first()) {
            $screen = $product->screen;
        }
        $image = $screen['image']->size($width, $height);

        return response(file_get_contents($image['path']))
            ->withHeaders([
                'Content-Type' => 'image/' . $screen['extension'],
            ]);
    }

    public function screenSave(Request $request, Product $product)
    {
        $this->validate($request, [
            'input_img' => 'required|array|min:1',
            'input_img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = $request->file('input_img');

        $destinationPath = public_path('/storage/uploads/products/' . $product->id);

        foreach ( $images as $image ) {
            //$image->store('uploads/products/' . $product->id, 'public');
            $image->move($destinationPath, time() . md5(microtime()) . '.' . $image->getClientOriginalExtension());
        }
        
        return redirect(route('prod.screen', $product))->with('status', 'Скриншот загружен');
    }

    public function screenDelete(Product $product, int $screen_id)
    {
        $product->screenDeleteById($screen_id);

        return redirect(route('prod.screen', $product))->with('status', 'Скриншот удален');
    }


    public function screenHightlight(Product $product, int $screen_id)
    {
        $product->screenHightlightById($screen_id);

        return redirect(route('prod.screen', $product))->with('status', 'Скриншот помечен как основной');
    }

    public function comment(Product $product)
    {
        return view('product.comment', compact('product'));
    }

    public function postComment(Request $request, Product $product)
    {
        $this->validate($request, [
            'comment' => 'required|string',
            'name' => 'required|string',
        ]);

        ProductComment::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'user_id' => Auth::user()->id ?? null,
        ]);

        return redirect()->back();
    }

    public function view(Product $product)
    {
        $product->with(['categories']);
        $product->increment('views');

        $actions = $product->adminActions;

        $products = Product::with(['categories'])->where('id', '!=', $product->id)->orderBy('id', 'desc')->get()->take(12);

        return view('product.view', compact('products', 'product', 'actions'));
    }

    public function edit(Product $product)
    {
        $categoriesAll = Category::get();
        //$productCategories = $product->categories()->pluck('id')->toArray();
        $actions = $product->adminActions;

        return view('product.edit', compact('categoriesAll', 'product', 'productCategories', 'actions'));
    }

    public function delete(Product $product)
    {
        $actions = $product->adminActions;

        return view('product.delete', compact('product', 'actions'));
    }

    public function deleteConfirm(Request $request, Product $product)
    {
        Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha',
        ])->validate();

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
