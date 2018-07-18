<div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table cart-table">
        <thead>
          <tr>
            <th class="table-title">Название</th>
            <th class="table-title">Цена</th>
            <th class="table-title">Количество</th>
            <th class="table-title">Всего</th>
          </tr>
        </thead>
        <tbody>

        @forelse( $products as $product )
          <tr>
            <td class="item-name-col">
              <figure>
                <a href="cart.html#"><img alt="{{ $product->title }}" src="{{ $product->screen['image']->size(100, 100)->get('src') }}"></a>
              </figure>
              <header class="item-name">
                <a href="cart.html#">{{ $product->title }}</a>
              </header>
              {{-- <ul>
                <li>Color: White</li>
                <li>Size: SM</li>
              </ul> --}}
            </td>
            <td class="item-price-col">&#8372;<span class="item-price-special">{{ number_format($product->price) }}</span></td>
            <td>
              <div class="custom-quantity-input product{{ $product->id }}" data-product-id="{{ $product->id }}">
                <input name="quantity" type="text" value="1" disabled> <a class="quantity-btn quantity-input-up" href="cart.html#" onclick="return!1"><i class="fa fa-angle-up"></i></a> <a class="quantity-btn quantity-input-down" href="cart.html#" onclick="return!1"><i class="fa fa-angle-down"></i></a>
              </div>
            </td>
            <td class="item-total-col">
              &#8372;<span data-product-price="{{$product->price}}" class="item-price-special test productPrice{{ $product->id }}">{{ number_format($product->price) }}</span> <a class="close-button" href="cart.html#"></a>
            </td>
          </tr>

        @empty 

        @endforelse
        <tr>
          <td>Оформить заказ</td>
          <td class="item-price-col">&#8372;<span class="item-price-special">{{ number_format($products->sum('price')) }}</span></td>
          <td>
            <div class="custom-quantity-input">
              <input class="productsCount" type="text" value="{{ order()->count() }}" disabled>
            </div>
          </td>
          <td>&#8372;<span class="item-price-special allPrice">{{ number_format($products->sum('price')) }}</span></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script>

    $(function() {
      $('.custom-quantity-input > a').click(function(){
        $this = this;
        console.log('=)');
        var product_id = $(this).parent('.custom-quantity-input').data('product-id');
        var quantity = $('.custom-quantity-input.product' + product_id + ' > input');
        var price = $('.productPrice' + product_id);
        console.log('product_id', product_id);
        console.log('price', price.data('product-price'));
        quantity.val( function(i, oldval) {
          let count;
          if ($($this).hasClass('quantity-input-up')) {
            count = ++oldval;
          } else {
            count = --oldval;
          }
          if (count < 1) {
            count = 1;
          }
          let newPrice = price.data('product-price') * count;
          console.log('newPrice', newPrice);
          price.html(new Intl.NumberFormat('en-IN').format(newPrice));
  
          return count;
        });
  
        var arr = document.getElementsByClassName('test');;
        var tot = 0;
        for(var i=0; i < arr.length; i++){
          tot += Number(String(arr[i].innerHTML).replace(',', '').replace(',', ''));
        }
  
        var arr = document.getElementsByName('quantity');;
        var tot2 = 0;
        for(var i=0; i < arr.length; i++){
          tot2 += Number(arr[i].value);
        }
        console.log('tot2', tot2);
        $('.allPrice').html(new Intl.NumberFormat('en-IN').format(tot));
        $('.productsCount').val(tot2);
  
      });
    });
  
  </script>