@extends('layouts.app')

@section('title', $category->name)

@section('meta')
<link rel="canonical" href="{{route('cat.view', [$category->slug])}}"/>
@endsection

@section('content')
    <div class="row">
        <div class="btn-group btn-breadcrumb">
            <a href="{{route('home')}}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
            @foreach ($category->getAncestorsAndSelf() as $breadcrumbs)
            <a href="{{route('cat.view', [$breadcrumbs->slug])}}" class="btn btn-primary">{{$breadcrumbs->name}}</a>
            @endforeach
        </div>
    </div>
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
                    @include('listing.card', [
                        'title' => $product->title,
                        'url' => route('prod.view', [$product->id]),
                        'description' => $product->description,
                        'description_small' => $product->description,
                        'image' => $product->screen,
                        'button' => [
                            ['url' => '#', 'title' => '2 Comments'],
                            ['url' => '#', 'title' => '8 Shares'],
                        ],
                    ])
                @empty
                    <div class="single-post mb-4 mr-3">
                        <p>Товары в эту категорию еще не были добавлены</p>
                    </div>
                @endforelse
        </section>

        {{ $products->links() }}
    </div>
@endsection