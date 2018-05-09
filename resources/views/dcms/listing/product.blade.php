

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
                    <span class="hide-mobile">Производитель: </span>Loft<br>
                    <span class="hide-mobile">Размеры: </span>1100/750/550
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
                            2 555 грн<span style="top: -0.67em; left: 4px; font-size: 67%; text-decoration: none; color: #fb515d; display: inline-block; position: relative;">-10%</span>
                        </div>
                        <div class="new">{{ number_format($price) }} грн</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="label discount"></div>
        <div class="product-code">Код: <b>{{ $id }}</b></div>
    </div>
</div>