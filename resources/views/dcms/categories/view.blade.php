@extends('layouts.app')

@section('title', $category->name)

@section('meta')
<link rel="canonical" href="{{route('cat.view', [$category])}}"/>
@endsection

@section('content')





    <div class="btn-group btn-breadcrumb">
        <a href="{{route('home')}}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
        @foreach ($category->getAncestorsAndSelf() as $breadcrumbs)
            <a href="{{route('cat.view', [$breadcrumbs])}}" class="btn btn-primary">{{$breadcrumbs->name}}</a>
        @endforeach
    </div>
    <div class="col-xl-7 col-md-12">
        <section class="section extra-margins listing-section mt-2">
            <h2 class="font-bold"><strong>{{$category->name}}</strong></h2>
            <hr class="red title-hr">
            
            {{-- <div class="row mb-4">

                @foreach ($category->children()->withCount('products')->get() as $child)
                <div class="single-post mr-2">
                    <a href="{{route('cat.view', [$child])}}" class="list-group-item list-group-item-action">
                        <h5>{{$child->name}} <span class="badge badge-danger badge-pill">{{$child->products_count}}</span></h5>
                    </a>
                </div>
                @endforeach
            </div> --}}
            @include('listing.products', ['products' => $products])
        </section>
    </div>
@endsection