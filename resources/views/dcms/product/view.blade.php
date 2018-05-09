@extends('layouts.app')

@section('title', $product->title)

@section('meta')
<link rel="canonical" href="{{route('prod.view', [$product->id])}}"/>
@if ($product->meta_description)
    <meta name="description" content="{{$product->meta_description}}" />
@endif
@endsection

@section('content')
<div class="row">
    <div class="btn-group btn-breadcrumb">
        <a href="{{route('home')}}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Вернуться</a>
    </div>
</div>

<div class="col-xl-8 col-md-12">

    <!--Card-->
    <div class="card card-body mb-5 px-0 py-0">
<div class="row">
        <div class="col-md-4">
            <p class="font-small grey-text mb-0">
                <i class="fa fa-clock-o"></i> {{$product->created_at}}
                <i class="fa fa-eye dark-grey-text"></i> <strong>{{$product->views}}</strong> 
            </p>
            @foreach ($product->categories()->get() as $category)
                <a href="{{ route('cat.view', [$category]) }}" rel="nofollow"><span class="badge indigo">{{$category->name}}</span></a>
            @endforeach
        </div>

        <!--Title-->
        <h1 style="margin-top: 0;">
            <strong>{{$product->title}}</strong>
        </h1>
    </div>
        <hr class="red title-hr">
        <img src="{{$product->screen}}" class="img-fluid z-depth-1 mx-4 rounded" alt="sample image" width="500">
        <hr>
        @if ($product->description)
            <div class="row mx-md-5 px-md-4 px-5 mt-3">
                <p class="dark-grey-text article">
                    {{$product->description}}
                </p>
            </div>
        @endif
    </div>
    <!--/.Card-->
</div>
@endsection

@section('right-column')

<div class="panel panel-default">
    <div class="panel-heading"><b>Код товара:</b> {{ $product->id }}</div>
    <div class="list-group">
        <div class="list-group-item">Размеры <span class="badge">900/2400(2200)/600(450)</span></div>
        <div class="list-group-item">Время доставки <span class="badge">5-15 рабочих дней</span></div>
        @if ( $product->price )
            <div class="list-group-item text-center" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <h3 itemprop="price" content="{{ $product->price }}">{{ number_format($product->price) }} <span itemprop="priceCurrency" content="UAH">грн.</span> {{ $product->type }}</h3>
                <a class="btn btn-primary btn-lg" href="#">Купить</a>
            </div>
        @endif
    </div>
</div>
@endsection