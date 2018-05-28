<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;

class ApiController extends Controller
{
    public function basket(Request $request, $view = null)
    {
        $orders = session('orders') ?? [];
        $products = Product::whereIn('id', $orders)->get();

        if ( $view ) {
            return view('api.orders', compact('products'));
        }
        return response()->json(['products' => $products], 200);
    }

    public function basketPush(Request $request)
    {
        $messages = [];

        Validator::make($request->all(), [
            'product_id' => 'required|integer',
        ], $messages)->validate();
        
        session()->push('orders', $request->product_id);
        session()->save();

        return response()->json(['success' => true], 200);
    }

    public function basketClear(Request $request)
    {
        session()->forget('orders');
        
        return redirect()->back();
    }
}
