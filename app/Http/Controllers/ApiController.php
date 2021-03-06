<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plugins\{NovaPoshta, Sms, Filter};
use App\{Product, SmsCode};
use Validator;

class ApiController extends Controller
{

    public function test()
    {
        return response("data: Hello Worlds\n\nid: 3\n\n", 200)
                  ->header('Content-Type', 'text/event-stream')
                  ->header('Cache-Control', 'no-cache');
    }

    public function agreement(Request $request, $view = null)
    {
        if ( $view ) {
            return view('api.agreement');
        }
        // return response()->json(['products' => $products], 200);
    }

    public function basket(Request $request, $view = null)
    {
        $products = order()->products();

        if ( $view ) {
            return view('api.orders', compact('products'));
        }
        return response()->json(['products' => $products], 200);
    }

    public function basketDelete(Request $request)
    {
        Validator::make($request->all(), [
            'product_id' => 'required|integer',
        ])->validate();

        order()->forget($request->product_id);

        return response()->json(order()->toArray(), 200);
    }

    public function updateProductCount(Request $request)
    {
        Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'count' => 'required|integer',
        ])->validate();

        order()->updateCountProduct($request->product_id, $request->count);

        return response()->json(order()->toArray(), 200); 
    }

    public function basketPush(Request $request)
    {
        $messages = [];

        Validator::make($request->all(), [
            'product_id' => 'required|integer',
        ], $messages)->validate();

        $product = Product::findOrFail($request->product_id);

        if (!$order = order()->orders()->where('product_id', $request->product_id)->first()) {
            order()->push($product);
        }

        return response()->json(['orders' => order()->toArray(), 'success' => true, 'countOrders' => order()->count(), 'product' => $product], 200);
    }

    public function basketClear(Request $request)
    {
        order()->clear();
        
        return redirect()->back();
    }

    public function cities(Request $request)
    {
        $messages = [];

        Validator::make($request->all(), [
            'refRegion' => 'required|string',
        ], $messages)->validate();
        
        $nova_poshta = new \App\Plugins\NovaPoshta;
        $cities = $nova_poshta->getCities($request->refRegion);

        return response()->json(['success' => true, 'cities' => $cities], 200);
    }

    public function offices(Request $request)
    {
        $messages = [];

        Validator::make($request->all(), [
            'refCity' => 'required|string',
        ], $messages)->validate();
        
        $nova_poshta = new \App\Plugins\NovaPoshta;
        $offices = $nova_poshta->getOffices($request->refCity);

        return response()->json(['success' => true, 'offices' => $offices], 200);
    }

    public function smsCode(Request $request)
    {
        Validator::make($request->all(), [
            'mobile' => 'required',
        ])->validate();

        $mobile = Filter::mobile($request->mobile);

        $code = SmsCode::create([
            'code' => mt_rand(11111, 99999),
            'mobile' => $mobile,
        ]);

        $request = Sms::send([$mobile], "Ваш код: {$code->code}");
        //$request = 'уии';

        if ( str_is('*Mobile in black list*', $request) ) {
            return response()->json(['error' => 'Ваш номер не может быть использован'], 200);
        }
        return response()->json(['success' => 'Ожидайте СМС'], 200);
    }
}
