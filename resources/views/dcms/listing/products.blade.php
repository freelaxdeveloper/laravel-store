@if( count($products) )
<div class="product-filter">
    <div class="limit"><i class="fa fa-eye" title="Показывать:"></i>
        {{-- @php( $limitValues = [1, 2, 3, 4, 5] ) --}}
        @php( $limitValues = [20, 25, 50, 75, 100] )
        <select id="input-limit" onchange="location = this.value;">
            @for($i = 0; $i < count($limitValues); $i++)
                <option value="{{ request()->fullUrlWithQuery(['limit' => $limitValues[$i]]) }}" @if(request()->get('limit') == $limitValues[$i]) selected="selected" @endif>{{ $limitValues[$i] }}</option>
            @endfor
        </select>
    </div>
    <div class="sort"><i class="fa fa-sort" title="Сортировать:"></i>
        @php( $sortValues = [
            ['sort' => 'created_at', 'order' => 'desc', 'name' => 'По умолчанию'],
            ['sort' => 'title', 'order' => 'ASC', 'name' => 'По Имени (A - Я)'],
            ['sort' => 'title', 'order' => 'desc', 'name' => 'По Имени (Я - A)'],
            ['sort' => 'price', 'order' => 'ASC', 'name' => 'По Цене (возрастанию)'],
            ['sort' => 'price', 'order' => 'desc', 'name' => 'По Цене (убыванию)'],
        ] )

        <select id="input-sort" onchange="location = this.value;">
            @for ($i = 0; $i < count($sortValues); $i++)
                <option value="{{ request()->fullUrlWithQuery(['sort' => $sortValues[$i]['sort'], 'order' => $sortValues[$i]['order']]) }}" @if( request()->get('sort') == $sortValues[$i]['sort'] && request()->get('order') == $sortValues[$i]['order'] ) selected="selected" @endif>{{ $sortValues[$i]['name'] }}</option>
            @endfor
        </select>
    </div>
</div>
@endif

@forelse ($products as $product)
    @include('listing.product', ['product' => $product])
@empty
    <div class="single-post mb-4 mr-3">
        <p>Товары в эту категорию еще не были добавлены</p>
    </div>
@endforelse
<div class="col-md-12">
    {{ $products->appends(request()->except('page'))->links() }}
</div>