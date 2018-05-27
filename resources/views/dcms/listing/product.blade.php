

<div class="product-cart-wrapper col-xs-12 col-sm-6 col-md-4">
    <div class="block product-cart">
        <div class="product-cart-over clear">
            <div class="product-info-wrapper">
                <a href="{{ $url }}" class="product-cover-link" data-product="{{ $id }}" data-name="{{ $title }}" data-page="1">
                    <img src="{{ $image }}" alt="{{ $title }}" title="{{ $title }}" width="259" height="190">
                </a>
                <div class="product-cart-title">
                    <h3>
                        <a href="{{ $url }}" data-product="{{ $id }}" data-name="{{ $title }}" data-page="1">{{ $title }}</a>
                    </h3>
                </div>
                <div class="product-cart-info">
                    @if ( isset($size) )
                        <span class="hide-mobile">Размеры:</span> {{$size}}
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
                    <button data-product-id="3703" href="/korzina" onclick="return false;" class="button buy">Купить</button>
                    <div class="price">
                        <div class="old">
                            @if ($discount)
                                {{ number_format($price_old) }}<span style="top: -0.67em; left: 4px; font-size: 67%; text-decoration: none; color: #fb515d; display: inline-block; position: relative; margin-right:7px;">{{$discount}}%</span>
                            @endif
                            @if ( price($price) !== $price )
                                {{ number_format($price) }}<span style="top: -0.67em; left: 4px; font-size: 67%; text-decoration: none; color: #fb515d; display: inline-block; position: relative;">{{ percent(price($price), $price) }}%</span>
                            @endif
                        </div>
                        <div class="new">{{ number_format(price($price)) }} {{ env('CURRENCY') }}</div>
                    </div>
                </div>
            </div>
        </div>
        @if ($discount)
            <div class="label discount"></div>
        @endif
        <div class="product-code">Код: <b>{{ $id }}</b></div>
    </div>
</div>