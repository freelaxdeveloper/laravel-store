@if(isset($grid))<div class="col-md-4 col-sm-6 col-xs-12">@endif
  <div class="item item-hover">
    <div class="item-image-wrapper">
      <figure class="item-image-container">
        <a href="{{ route('prod.view', [$product]) }}"><img alt="item1" class="item-image" src="{{ $product->screen['image']->size(228, 319)->get('src') }}"> <img alt="item1 Hover" class="item-image-hover" src="{{ $product->screens->first()['image']->size(228, 319)->get('src') }}"></a>
      </figure>
      <div class="item-price-container">
        @if( $product->discount )
          <span class="old-price">&#8372;{{ number_format($product->price_old) }}</span>
        @endif
        <span class="item-price">&#8372;{{ number_format(price($product->price)) }}</span>
      </div>
      <span class="new-rect">New</span> 
      @if ($product->discount)<span class="discount-rect">{{$product->discount}}%</span>@endif
    </div>
    <div class="item-meta-container">
      <div class="ratings-container">
        <div class="ratings">
          <div class="ratings-result" data-result="80"></div>
        </div><span class="ratings-amount">5 Отзывов</span>
      </div>
      <h3 class="item-name"><a href="{{ route('prod.view', [$product]) }}">{{ $product->title }}</a></h3>
      <div class="item-action">
        <a class="item-add-btn" href="index.html#"><span class="icon-cart-text">В корзину</span></a>
        <div class="item-action-inner">
          <a class="icon-button icon-like" href="index.html#">Избранное</a> <a class="icon-button icon-compare" href="index.html#">Купить</a>
        </div>
      </div>
    </div>
  </div>
@if(isset($grid))</div>@endif
    
