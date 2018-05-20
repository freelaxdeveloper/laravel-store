@extends('layouts.app')

@section('title', 'Админка')

@section('content')

    <h1>Личный кабинет</h1>

    <b>Ваша личная скидка составляет:</b> {{ Auth::user()->discount }}% на все покупки нашого магазина. Цены указаны уже с учетом Вашей скидки.

@endsection