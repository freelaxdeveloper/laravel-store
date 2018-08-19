@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
<section id="content">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
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




    <h1>Мои заказы</h1>

    <div class="orders">
        @foreach (Auth::user()->orders as $order)
            <div class="order">
                <spoiler title='
                    <div>№{{ $order['id'] }}</div> 
                    <div>{{ $order['created_at'] }}</div> 
                    <div>
                        @foreach ($order->products() as $product)
                            <img class="img-min" src="{{ image($product['screen']['path'])->size(32)->get('src') }}">
                        @endforeach
                    </div>
                    <div>{{ $order->products()->count() }} {{ trans_choice('plural.product', $order->products()->count()) }} на {{ number_format($order->products()->sum('price')) }} грн.</div>
                    <div>доставляется</div>
                '>
                    <div class="products">
                        @foreach ($order->products() as $product)
                            <div class="product">
                                <div><img src="{{ image($product['screen']['path'])->size(64)->get('src') }}"></div>
                                <div>
                                    <a href="{{ route('prod.view', [$product['slug']]) }}">{{ $product['title'] }}</a> №{{ $product['id'] }}<br>
                                    {{ number_format($product['price']) }} грн.
                                </div>
                            </div>
                        @endforeach
                    </div>
                </spoiler>
            </div>
        @endforeach
    </div>





</div></div></div>
</section>
@endsection

@section('js')

    <script type="text/javascript">
        // Get The <spoiler> tag Name
        var e = $("spoiler");
        // Declare another Variable
        var t = e;
        // Loop The Function For Each Element In DOM
        for (var i = 0; i < t.length; i++) {
            e[i].innerHTML = '<div class="spoiler-wrap"><div class="spoiler-head collapsed">'+e[i].title+'</div><div class="spoiler-body">'+t[i].innerHTML+'</div>';
        }
    </script>
@endsection