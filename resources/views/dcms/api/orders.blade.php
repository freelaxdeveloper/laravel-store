<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Корзина</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>

<div class="modal-body">
    @if ( count($products) )
        <h4><b>{{ $products->count() }}</b> {{ trans_choice('plural.product', $products->count()) }} на сумму <b>{{ number_format($products->sum('price')) }}</b> {{ env('CURRENCY') }}</h4>
    @endif
    {{-- @lang('plural.product') --}}

    @forelse( $products as $product )
        <div class="media">
            <a class="pull-left" href="{{ route('prod.view', [$product]) }}">
              <img class="media-object" width="120" src="{{ $product->screen['src'] }}" alt="{{ $product->title }}">
            </a>
            <div class="media-body">
              <h4 class="media-heading">{{ $product->title }}</h4>
              <p>{!! $product->description !!}</p>
              <p><b>Код товара:</b> {{ $product->id }}</p>
              <p>
                  <b>Стоимость:</b> {{ number_format($product->price) }} {{ env('CURRENCY') }}
                  @if ( Auth::check() && Auth::user()->discount )
                    (-{{ Auth::user()->discount }}%)
                  @endif
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
        <a class="btn btn-primary" href="{{ route('basket.oformit-zakaz') }}">Оформить заказ</a>
    @else
        <button type="button" class="btn btn-default" data-dismiss="modal">Начать покупки</button>
    @endif
</div>