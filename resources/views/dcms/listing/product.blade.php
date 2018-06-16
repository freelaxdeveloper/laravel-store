<div class="product-cart-wrapper col-xs-12 col-sm-6 col-md-4">
    <div class="block product-cart">
        <div class="product-cart-over clear">
            <div class="product-info-wrapper">
                <a href="{{ route('prod.view', [$product]) }}" class="product-cover-link" data-product="{{ $product->id }}" data-name="{{ $product->title }}" data-page="1">
                    <img src="{{ $product->screens->first()['src'] }}" alt="{{ $product->title }}" title="{{ $product->title }}" width="259" height="190">
                </a>
                <div class="product-cart-title">
                    <h3>
                        <a href="{{ route('prod.view', [$product]) }}" data-product="{{ $product->id }}" data-name="{{ $product->title }}" data-page="1">{{ $product->title }}</a>
                    </h3>
                </div>
                <div class="product-cart-info">
                    @if ( isset($product->size) )
                        <span class="hide-mobile">Размеры:</span> {{ $product->size }}
                    @endif
                </div>
                <div class="product-cart-reviews clear">
                    <div class="product-cart-reviews-count">
                        0 отзывов
                    </div>
                    <div class="product-cart-stars-wrapper">
                        <div class="product-cart-stars"></div>
                    </div>
                </div>
                <div class="product-cart-price-wrapper clear">
                    <button data-product-id="{{ $product->id }}" href="/korzina" onclick="return false;" class="button buy">Купить</button>
                    <div class="price">
                        <div class="old">
                            @if ($product->discount)
                                {{ number_format($product->price_old) }}<span style="top: -0.67em; left: 4px; font-size: 67%; text-decoration: none; color: #fb515d; display: inline-block; position: relative; margin-right:7px;">{{$product->discount}}%</span>
                            @endif
                            @if ( price($product->price) !== $product->price )
                                {{ number_format($product->price) }}<span style="top: -0.67em; left: 4px; font-size: 67%; text-decoration: none; color: #fb515d; display: inline-block; position: relative;">{{ percent(price($product->price), $product->price) }}%</span>
                            @endif
                        </div>
                        <div class="new">{{ number_format(price($product->price)) }} {{ env('CURRENCY') }}</div>
                    </div>
                </div>
            </div>
        </div>
        @if ($product->discount)
            <div class="label discount"></div>
        @endif
        <div class="product-code">Код: <b>{{ $product->id }}</b></div>
    </div>
</div>