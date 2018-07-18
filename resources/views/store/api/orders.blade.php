<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Корзина</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>

<div class="modal-body">
    @if ( count($products) )
        <h4><b class="productsCount">{{ order()->count() }}</b> {{ trans_choice('plural.product', order()->count()) }} на сумму <b class="allPrice">{{ number_format($products->sum('price')) }}</b> {{ env('CURRENCY') }} </h4>
    @endif
    {{-- @lang('plural.product') --}}

    @forelse( $products as $product )
        <div class="media">
            <a class="pull-left" href="{{ route('prod.view', [$product]) }}">
              <img class="media-object" src="{{ $product->screen['image']->size(100, 100)->get('src') }}" alt="{{ $product->title }}">
            </a>
            <div class="media-body">
              <h4 class="media-heading">{{ $product->title }}</h4>
              <p>{!! $product->meta_description !!}</p>
              <p><b>Код товара:</b> {{ $product->id }}</p>
              <p>
                <b>Стоимость:</b> <span data-product-price="{{$product->price}}" class="test productPrice{{ $product->id }}">{{ number_format($product->price) }}</span> {{ env('CURRENCY') }}
                @if ( Auth::check() && Auth::user()->discount )
                  (-{{ Auth::user()->discount }}%)
                @endif
                <span class="quantity product{{ $product->id }}" data-product-id="{{ $product->id }}">
                  <button type="button" class="no-radius btn btn-primary btn-xs minus ">-</button>
                  <input name="qty" class="form-input" type="text" value="{{ $product->count }}" size="2" disabled>
                  <button type="button" class="btn btn-primary btn-xs plus no-radius">+</button>
                </span>
              </p>
            </div>
        </div>
        @if( !$loop->last )
            <hr class="red title-hr">
        @endif
    @empty
        Корзина пуста :(
    @endforelse
</div>

<div class="modal-footer">
    @if ( count($products) )
        <form action="{{ route('basketClear') }}" style="display:inline-block;" method="POST">
            @csrf
            <input class="btn btn-danger basketClear" type="submit" value="Очистить">
        </form>
        <a type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</a>
        <a class="btn btn-primary" href="{{ route('basket.oformit-zakaz') }}">Оформить заказ</a>
    @else
        <button type="button" class="btn btn-default" data-dismiss="modal">Начать покупки</button>
    @endif
</div>
<script>

  $(function() {
    $('.quantity > button').click(function(){
      $this = this;
      var product_id = $(this).parent('.quantity').data('product-id');
      var quantity = $('.quantity.product' + product_id + ' > input');
      var price = $('.productPrice' + product_id);

      quantity.val( function(i, oldval) {
        let count;
        if ($($this).hasClass('plus')) {
          count = ++oldval;
        } else {
          count = --oldval;
        }
        if (count < 1) {
          count = 1;
        }
        let newPrice = price.data('product-price') * count;
        price.html(new Intl.NumberFormat('en-IN').format(newPrice));

        return count;
      });

      var arr = document.getElementsByClassName('test');;
      var tot = 0;
      for(var i=0; i < arr.length; i++){
        tot += Number(String(arr[i].innerHTML).replace(',', '').replace(',', ''));
      }
      function evil(fn) {
        return new Function('return ' + fn)();
      }

      var arr = document.getElementsByName('qty');;
      var tot2 = 0;
      for(var i=0; i < arr.length; i++){
        tot2 += Number(arr[i].value);
      }
      $('.allPrice').html(new Intl.NumberFormat('en-IN').format(tot));
      $('.productsCount').html(tot2);

    });
  });

</script>