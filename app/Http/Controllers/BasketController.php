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
        if ( !$products = order()->pull()) {
            return redirect()->back()->withErrors('Ваша корзина пуста')->withInput($request->all());
        }
        
        Validator::make($request->all(), [
            'first_last' => 'required',
            'mobile' => 'required',
            'region' => 'required',
            'cities' => 'required',
            'offices' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ])->validate();

        // требуем код который приходит в смс
        // пока что отключим эту ф-цию
        if ( !\Auth::check() && false ) {
            Validator::make($request->all(), [
                'sms_code' => 'required|sms',
            ])->validate();
        }

        $password = str_random(8);
        $user = User::firstOrCreate(
            ['mobile' => Filter::mobile($request->mobile)],
            [
                'name' => $request->first_last,
                'password' => bcrypt($password),
            ]
        );

        $order = Order::create([
            'user_id' => $user->id,
            'products' => $products->toArray(),
            'comment' => $request->comment,
        ]);

        $messages = ['Ваш заказ принят в оработку'];
        // если пользователь не авторизован, и при оформлении заказа был создан
        // авторизовываем его
        if ( !Auth::check() && $user->wasRecentlyCreated ) {
            Auth::loginUsingId($user->id, true);

            $messages[] = 'Ваш пароль от профиля: <b>' . $password . '</b>. Сохрание его, больше вы его не увидите!';
        }

        return redirect(route('user.my'))->with('status', $messages);
    }
}
