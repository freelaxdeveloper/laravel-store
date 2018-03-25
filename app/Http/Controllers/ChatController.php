<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;

class ChatController extends Controller
{
    public function add(Request $request)
    {
        $messages = [
            'message.required' => 'Сообщение обязательно для заполнения',
            'message.max' => 'Сообщение не должно превышать 255 символа',
        ];
        
        \Validator::make($request->all(), [
            'message' => 'required|max:255',
        ], $messages)->validate();

        Chat::create([
            'user_id' => \Auth::user()->id,
            'message' =>$request->message,
        ]);
        return back()->with('status', 'Сообщение отправлено');
    }
}
