@extends('layouts.app')

@section('title', $category->name)

@section('meta')
<link rel="canonical" href="{{route('cat.view', [$category])}}"/>
@endsection

@section('admin-menu')
    <a class="dropdown-item" href="{{ route('prod.add', [$category]) }}">Добавить товар</a>
@endsection

@section('content')
    @foreach ($category->getAncestorsAndSelf() as $breadcrumbs)
        {{--  {{$breadcrumbs->name}}   --}}
    @endforeach
    <div class="col-xl-7 col-md-12">
        <section class="section extra-margins listing-section mt-2">
            <h2 class="font-bold"><strong>{{$category->name}}</strong></h2>
            <hr class="red title-hr">
            
            <div class="row mb-4">

                @foreach ($category->children()->withCount('products')->get() as $child)
                <div class="single-post mr-2">
                    <a href="{{route('cat.view', [$child->slug])}}" class="list-group-item list-group-item-action">
                        <h5>{{$child->name}} <span class="badge badge-danger badge-pill">{{$child->products_count}}</span></h5>
                    </a>
                </div>
                @endforeach
            </div>
                @forelse ($products as $product)
                    @include('product.inc.list', ['product' => $product])
                @empty
                    <div class="single-post mb-4 mr-3">
                        <p>Товары в эту категорию еще не были добавлены</p>
                    </div>
                @endforelse
        </section>

        {{ $products->links() }}
    </div>
@endsection