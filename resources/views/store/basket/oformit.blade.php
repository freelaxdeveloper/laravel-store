@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('head')
    @parent

    <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
@endsection

@section('content')
<section id="content">
    <div id="breadcrumb-container">
      <div class="container">
        <ul class="breadcrumb">
          <li>
            <a href="index.html">Главная</a>
          </li>
          <li class="active">Корзина</li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <header class="content-title">
            <h1 class="title">Корзина</h1>
            <p class="title-desc">Только на этой неделе вы можете использовать бесплатную премиальную доставку.</p>
          </header>
          <div class="xs-margin"></div>
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
                          <input name="quantity" type="text" value="{{ $product->count }}" disabled> <a class="quantity-btn quantity-input-up" href="cart.html#" onclick="return!1"><i class="fa fa-angle-up"></i></a> <a class="quantity-btn quantity-input-down" href="cart.html#" onclick="return!1"><i class="fa fa-angle-down"></i></a>
                        </div>
                      </td>
                      <td class="item-total-col">
                        &#8372;<span data-product-price="{{$product->price_origin}}" class="item-price-special test productPrice{{ $product->id }}">{{ number_format($product->price) }}</span> <a class="close-button" href="cart.html#"></a>
                      </td>
                    </tr>
          
                  @empty 
          
                  @endforelse
                  {{-- <tr>
                    <td>Оформить заказ</td>
                    <td class="item-price-col">&#8372;<span class="item-price-special">{{ number_format($products->sum('price')) }}</span></td>
                    <td>
                      <div class="custom-quantity-input">
                        <input class="productsCount" type="text" value="{{ order()->count() }}" disabled>
                      </div>
                    </td>
                    <td>&#8372;<span class="item-price-special allPrice">{{ number_format($products->sum('price')) }}</span></td>
                  </tr> --}}
                  </tbody>
                </table>
              </div>
            </div>

          <div class="lg-margin"></div>
          <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 lg-margin">
              <div class="tab-container left clearfix">
                <ul class="nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="cart.html#shipping">Доставка</a>
                  </li>
                  {{-- <li>
                    <a data-toggle="tab" href="cart.html#discount">Код скидки</a>
                  </li> --}}
                </ul>
                <div class="tab-content clearfix">
                  <div class="tab-pane active" id="shipping">
                    {!! Form::open(['route' => ['basket.oformit-zakaz']]) !!}
                    @php( $first_last = Auth::user()->name ?? null )
                    @include('components.form.text', [
                      'name' => 'first_last', 
                      'title' => 'Имя',
                      'value' => $first_last,
                      'classGroupAddon' => '',
                    ])
                    @php( $mobile = Auth::user()->mobile ?? null )
                    @include('components.form.text', [
                      'name' => 'mobile', 
                      'title' => 'Номер телефона',
                      'value' => $mobile, 
                      'attributes' => [
                        'class' => 'form-control bfh-phone', 
                        'data-format' => '+38 (ddd) ddd-dddd',
                      ],
                      'classGroupAddon' => '',
                    ])
                    <p class="help-block">Ваш номер телефона не разглашается, и использоуется только для обратной связи и входа в свой личный кабинет</p>

                    <p class="shipping-desc">Введите пункт назначения</p>
                      @include('components.form.select', [
                        'name' => 'region',
                        'title' => 'Область&#42;',
                        'items' => $regions->pluck('Description', 'Ref'),
                        'empty' => true,
                        'attributes' => [
                            'class' => 'form-control region'
                        ],
                      ])
                      @include('components.form.select', [
                        'name' => 'cities',
                        'title' => 'Город&#42;',
                        'items' => ['Выберите область'],
                        'empty' => true,
                        'attributes' => [
                            'class' => 'form-control cities',
                            'disabled' => 'disabled',
                        ],
                      ])                
                      @include('components.form.select', [
                        'name' => 'offices',
                        'title' => 'Отделение №:&#42;',
                        'items' => ['Выберите Город'],
                        'empty' => true,
                        'attributes' => [
                            'class' => 'form-control offices',
                            'disabled' => 'disabled',
                        ],
                      ])
                      {!! NoCaptcha::display() !!}
                      {{-- <p class="text-right"><input class="btn btn-custom-2" type="submit" value="GET QUOTES"></p> --}}
                    @include('components.form.submit', ['title' => 'Оформить', 'attributes' => ['class' => 'btn btn-custom']])
                    {!! Form::close() !!}
                  </div>
                  {{-- <div class="tab-pane" id="discount">
                    <p>Введите свой скидочный купон здесь.</p>
                      <div class="input-group">
                        <input class="form-control" placeholder="Купон" required="" type="text">
                      </div><input class="btn btn-custom-2" type="submit" value="Применить купон">
                  </div> --}}
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <table class="table total-table">
                <tbody>
                  <tr>
                    <td class="total-table-title">Промежуточный итог:</td>
                    <td>&#8372;<span class="allPrice">{{ number_format($products->sum('price')) }}</span></td>
                  </tr>
                  <tr>
                    <td class="total-table-title">Перевозка:</td>
                    <td>&#8372;6.00</td>
                  </tr>
                  {{-- <tr>
                    <td class="total-table-title">Доставка (0%):</td>
                    <td>м0.00</td>
                  </tr> --}}
                </tbody>
                <tfoot>
                  <tr>
                    <td>Всего:</td>
                    <td>&#8372;<span class="allPrice">{{ number_format($products->sum('price') + 6) }}</span></td>
                  </tr>
                </tfoot>
              </table>
              <div class="md-margin"></div><a class="btn btn-custom-2" href="{{ url()->previous() }}">Продолжить покупки</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('js')
<script src="{{elixir('/js/select2.min.js')}}"></script>
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
          fetch('/api/basket/update/count', { 
            method: 'POST', 
            credentials: 'same-origin',
            headers: { 
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({product_id: product_id, count: count}),
          });
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


@endsection