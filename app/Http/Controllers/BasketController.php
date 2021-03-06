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
        if ( !order()->count() ) {
            return redirect(route('home'));
        }
        $products = order()->products();

        return view('basket.oformit', compact('regions', 'products'));
    }

    public function oformitZakazPost(Request $request)
    {
        if ( !order()->count()) {
            return redirect()->back()->withErrors('Ваша корзина пуста')->withInput($request->all());
        }
        
        Validator::make($request->all(), [
            'first_last' => 'required',
            'mobile' => 'required',
            'region' => 'required',
            'cities' => 'required',
            'offices' => 'required',
            'comment' => 'string|nullable',
            // 'g-recaptcha-response' => 'required|captcha',
        ])->validate();

        // требуем код который приходит в смс
        // пока что отключим эту ф-цию
        if ( !Auth::check() && false ) {
            Validator::make($request->all(), [
                'sms_code' => 'required|sms',
            ])->validate();
        }
        $products = order()->pull();

        $password = str_random(8);
        
        if (!Auth::check()) {
            $user = User::firstOrCreate(
                ['mobile' => Filter::mobile($request->mobile)],
                [
                    'name' => $request->first_last,
                    'password' => bcrypt($password),
                ]
            );    
        } else {
            $user = Auth::user();
        }

        $order = Order::create([
            'user_id' => $user->id,
            'products' => $products->toArray(),
            'comment' => $request->comment,
            'mobile' => $request->mobile,
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
