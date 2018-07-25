<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Validator;

class SubscribeController extends Controller
{

    public function subscribeEmail(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:subscriptions',
        ])->validate();

        Subscription::create([
            'email' => $request->email,
            'type' => 'email',
        ]);

        session(['subscribeEmail' => $request->email]);

        return $this->success(['message' => 'Эта почта успешно подписана на рассылку']);
    }
}
