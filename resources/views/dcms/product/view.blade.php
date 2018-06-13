@extends('layouts.app')

@section('title', $product->title)

@section('meta')

    <link rel="canonical" href="{{route('prod.view', [$product->id])}}"/>
    @if ($product->meta_description)
        <meta name="description" content="{{$product->meta_description}}" />
    @endif

@endsection

@section('content')
    <!--  Modal content for the mixer image example -->
    <div class="modal fade pop-up-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel-1">{{ $product->title }}</h4>
                </div>
                <div class="modal-body">
                    <img src="http://i.imgur.com/YZ7AGyF.jpg.jpg" class="img-responsive" alt="">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal mixer image -->

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
        <div class="row">
            <div class="col-md-8">
                <a href="#" data-toggle="modal" data-target=".pop-up-1">
                    <img src="{{$product->screens->first()['src']}}" class="product-screen" width="500">
                </a>
            </div>
            <div class="col-md-4">
                @foreach($product->screens as $screen)
                    <img src="{{$screen['src']}}" class="other-screen" width="128">
                @endforeach
            </div>
        </div>
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

@section('js')
    <script>
        $(document).ready(function () {

            $('.other-screen').click(function () {
                let $this = $(this);
                console.log($this.attr('src'));

                $('.product-screen').attr('src', $this.attr('src'));
            });

            $('.product-screen').click(function() {
                let $this = $(this);
                $('.img-responsive').attr('src', $this.attr('src'));
            });
        });
    </script>

@endsection

@section('right-column')

<div class="panel panel-default">
    <div class="panel-heading"><b>Код товара:</b> {{ $product->id }}</div>
    <div class="list-group">
        <div class="list-group-item">Размеры <span class="badge">900/2400(2200)/600(450)</span></div>
        <div class="list-group-item">Время доставки <span class="badge">{{ env('DELIVERY_TIME') }}</span></div>
        @if ( $product->price )
            <div class="list-group-item text-center" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <h3 itemprop="price" content="{{ $product->price }}">{{ number_format(price($product->price)) }} <span itemprop="priceCurrency" content="UAH">{{ env('CURRENCY') }}</span> {{ $product->type }}</h3>
                <a class="btn btn-primary btn-lg buy" href="#" data-product-id="{{ $product->id }}" onclick="return false;">Купить</a>
            </div>
        @endif
    </div>
</div>
@endsection