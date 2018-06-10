@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('content')

{{-- {{dd(Config::get('sms.test'))}} --}}
<div class="row">
    <div class="btn-group btn-breadcrumb">
        <a href="{{route('home')}}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Продолжить покупки</a>
    </div>
</div>

<form method="POST" action="{{ route('basket.oformit-zakaz') }}">
    <p><h3>Оформление заказа</h3></p>
    <p class="form-text text-muted">
        В большинстве случаев, оплата заказа производится по факту получения. На некоторые виды товара может понадобиться частичная предоплата. Полные условия оплаты и этапы выполнения заказа Вам сообщат наши менеджеры при обработке заказа в телефонном режиме.
    </p>
    @csrf
    <div class="form-group">
        <label for="first_last">Имя и фамилия:</label>
        <input name="first_last" type="text" class="form-control" value="@auth {{ Auth::user()->name }} @else {{ old('first_last') }} @endauth" @auth disabled @endauth>
    </div>
    <div class="form-group">
        <label for="mobile">Номер телефона:</label>
        <input name="mobile" value="@auth {{ Auth::user()->mobile }} @else {{ old('mobile') }} @endauth" type="text" class="form-control bfh-phone" data-format="+38 (ddd) ddd-dddd" @auth disabled @endauth>
    </div>
    <hr class="red title-hr">
    <p><h4>Адрес доставки</h4></p>
    <div class="form-group">
        <label for="region">Область:</label>
        <select name="region" class="form-control region">
            <option></option>
            @foreach ( $regions as $region )
                <option value="{{ $region->Ref }}">{{ $region->Description }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="cities">Город:</label>

        <select name="cities" class="form-control cities" disabled="disabled">
            <option>Выберите область</option>
        </select>
    </div>
    <div class="form-group">
        <label for="offices">Отделение №:</label>
        <select name="offices" class="form-control offices" disabled="disabled">
            <option>Выберите город</option>
        </select>
    </div>
    @guest
        <div class="form-group">
            <label for="first_last">Код пришедший в СМС: <span class="confirm-phone-text">[<span>отправить</span>]</span></label>
            <input name="sms_code" type="text" class="form-control">
            {{-- <p class="form-text text-muted">
                При отправки кода, у вас должна быть пройдена капча Google
            </p> --}}
        </div>
    @endguest
    {!! NoCaptcha::display() !!}

    <input type="submit" value="Заказать" class="btn btn-primary">
</form>
@endsection

@section('right-column')

<div class="panel panel-default">
    <div class="panel-heading"><b>Ваш заказ</b></div>
    <div class="panel-body">
        <div class="products">
            @foreach ($products as $product)
                <div class="product">
                    {{ $product->title }} (<b>{{ number_format(price($product->price)) }}</b> {{ env('CURRENCY') }})
                </div>
            @endforeach
        </div>
        Всего: <b>{{ number_format(price($products->sum('price'))) }}</b> {{ env('CURRENCY') }}
    </div>
</div>

@endsection