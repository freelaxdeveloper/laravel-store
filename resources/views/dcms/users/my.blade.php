@extends('layouts.app')

@section('title', 'Админка')

@section('content')

    <h1>Личный кабинет</h1>

    <b>Ваша личная скидка составляет:</b> {{ Auth::user()->discount }}% на все покупки нашого магазина. Цены указаны уже с учетом Вашей скидки.<br><br>
    {{-- {{dd(Auth::user()->orders->products->sum('price'))}} --}}
    @foreach (Auth::user()->orders as $order)
        Всего: {{ number_format($order->products()->sum('price')) }} грн.<br>
        @foreach ($order->products() as $product)
            <a href="{{ route('prod.view', [$product['slug']]) }}">{{ $product['title'] }}</a> ({{ number_format($product['price']) }} грн.)<br>
        @endforeach
        <hr />
    @endforeach
@endsection