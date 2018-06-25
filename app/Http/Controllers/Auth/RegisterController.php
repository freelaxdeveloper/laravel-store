<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Plugins\Filter;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'email.unique' => 'Такой E-mail уже зарегистрирован у нас на сайте',
            'mobile.unique' => 'Такой номер телефона уже зарегистрирован у нас на сайте',
            'password.required' => 'Пароль обязателен для заполнения',
            'password.confirmed' => 'Вы не подтверили пароль',
        ];

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], $messages);

        $user = User::where('mobile', Filter::mobile($data['mobile']))->first();
        $validator->after(function ($validator) use ($user) {
            if ($user) {
                $validator->errors()->add('mobile.unique', 'Такой номер телефона уже зарегистрирован у нас на сайте');
            }
        });
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            // 'email' => $data['email'],
            'mobile' => Filter::mobile($data['mobile']),
            'password' => bcrypt($data['password']),
        ]);
    }
}
