@extends('layouts.app')

@section('title', 'Мои заказы')

@section('left')

    Мой кабинет

    @include('users.inc.menu')
    
@endsection

@section('content')

    <h1>Мои заказы</h1>

    <div class="orders">
        @foreach (Auth::user()->orders as $order)
            <div class="order">
                <spoiler title='
                    <div>№{{ $order['id'] }}</div> 
                    <div>{{ $order['created_at'] }}</div> 
                    <div>
                        @foreach ($order->products() as $product)
                            <img src="{{ $product['screens'][0]['src'] }}" width="32">
                        @endforeach
                    </div>
                    <div>{{ $order->products()->count() }} {{ trans_choice('plural.product', $order->products()->count()) }} на {{ number_format($order->products()->sum('price')) }} грн.</div>
                    <div>доставляется</div>
                '>
                    <div class="products">
                        @foreach ($order->products() as $product)
                            <div class="product">
                                <div><img src="{{ $product['screens'][0]['src'] }}" width="64"></div>
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