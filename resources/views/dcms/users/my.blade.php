@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('left')

    Мой кабинет

    @include('users.inc.menu')
    
@endsection

@section('content')

    <h1>Личные данные</h1>
    
    <div>
        Имя: {{ Auth::user()->name }}
    </div>
    <div>
        Телефон: {{ Auth::user()->mobile }}
    </div>
    <div>
        Email: {{ Auth::user()->email }}
    </div>
    <div>
        Адрес для доставок: Запорожье Запорожская обл. Запорожье р-н
    </div>

    <b>Ваша личная скидка составляет:</b> {{ Auth::user()->discount }}% на все покупки нашого магазина. Цены указаны уже с учетом Вашей скидки.<br><br>
    {{-- {{dd(Auth::user()->orders->products->sum('price'))}} --}}
@endsection