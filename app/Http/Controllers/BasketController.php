<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Order, Product};
use App\Plugins\Filter;
use Validator;
use Auth;

class BasketController extends Controller
{
    public function oformitZakaz()
    {
        $nova_poshta = new \App\Plugins\NovaPoshta;
        $regions = $nova_poshta->getRegions();
        $products = order()->products();

        return view('basket.oformit', compact('regions', 'products'));
    }

    public function oformitZakazPost(Request $request)
    {
        Validator::make($request->all(), [
            'first_last' => 'required',
            'mobile' => 'required',
            'region' => 'required',
            'cities' => 'required',
            'offices' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ])->validate();

        if ( !\Auth::check() ) {
            Validator::make($request->all(), [
                'sms_code' => 'required|sms',
            ])->validate();
        }


        if ( !$products = order()->pull()) {
            return redirect()->back()->withErrors('Ваша корзина пуста')->withInput($request->all());
        }

        $user = User::firstOrCreate(
            ['mobile' => Filter::mobile($request->mobile)],
            [
                'name' => $request->first_last,
                'password' => bcrypt(str_random(8)),
            ]
        );

        $order = Order::create([
            'user_id' => $user->id,
            'products' => $products->toArray(),
            'comment' => $request->comment,
        ]);

        if ( !Auth::check() ) {
            Auth::loginUsingId($user->id, true);
        }

        return redirect(route('user.my'))->with('status', 'Ваш заказ принят в оработку');
    }
}
