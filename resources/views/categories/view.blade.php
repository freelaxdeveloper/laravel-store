@extends('layouts.app')

@section('title', $category->name)

@section('meta')
<link rel="canonical" href="{{route('cat.view', [$category->slug])}}"/>
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

                @foreach ($products as $product)
                    @include('product.inc.list', ['product' => $product])
                @endforeach
            </div>
        </section>

        {{ $products->links() }}
    </div>
@endsection