<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{UsersBase, Order, Product};
use Validator;

class BasketController extends Controller
{
    public function oformitZakaz()
    {
        $nova_poshta = new \App\Plugins\NovaPoshta;
        $regions = $nova_poshta->getRegions();

        return view('basket.oformit', compact('regions'));
    }

    public function oformitZakazPost(Request $request)
    {
        Validator::make($request->all(), [
            'first_last' => 'required',
            'phone' => 'required',
            'region' => 'required',
            'cities' => 'required',
            'offices' => 'required',
            'sms_code' => 'required|sms',
            'g-recaptcha-response' => 'required|captcha',
        ])->validate();


        if ( !$orders = session()->pull('orders')) {
            return redirect()->back()->withErrors('Ваша корзина пуста')->withInput($request->all());
        }
        $products = Product::whereIn('id', $orders)->get();

        $userBase = UsersBase::updateOrCreate(
            ['phone' => $request->phone],
            ['full_name' => $request->first_last]
        );

        $order = Order::create([
            'user_base_id' => $userBase->id,
            'products' => $products->toArray(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('status', 'Ваш заказ принят в оработку');
    }
}
