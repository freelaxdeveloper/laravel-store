@extends('layouts.app')

@section('title', 'Вы выбрали №' . $product->id)

@section('content')
<div class="col-xl-8 col-md-12">

    <!--Card-->
    <div class="card card-body mb-5 px-0 py-0">

        <div class="post-data mb-4 ml-4 mt-4">
            <p class="font-small grey-text mb-0">
                <i class="fa fa-clock-o"></i> {{$product->created_at}}</p>
        </div>

        <!--Title-->
        <h1 class="font-bold mt-3 text-center">
            <strong>Вы выбрали №{{$product->id}}</strong>
        </h1>
        <hr class="red title-hr">

        <img src="{{$product->screen}}" class="img-fluid z-depth-1 mx-4 rounded" alt="sample image">

        <div class="row px-4">

                <!--Grid column-->
                <div class="col-md-6 mt-4">

                    <h5 class="font-bold dark-grey-text">
                        <i class="fa fa-lg fa-newspaper-o mr-3 dark-grey-text"></i>
                        <strong>{{$product->views}}</strong> Views</h5>

                </div>
                <!--Grid column-->
                @auth
                    @if (Auth::user()->id && Auth::user()->hasRole('admin'))
                        <!--Grid column-->
                        <div class="col-md-6 mt-2 d-flex justify-content-end">

                            <!--Edit-->
                            <a href="{{route('prod.edit', $product->id)}}" type="button" class="btn-floating btn-small btn-fb">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <!--Grid column-->
                    @endif
                @endauth
            </div>

        <hr>
        <section class="text-left mt-4">

            <h4 class="font-bold mt-5 mb-3">
                <strong>Другие наши работы</strong>
            </h4>

            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class=""></li>
                    <li data-target="#multi-item-example" data-slide-to="1" class="active"></li>
                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <!--First slide-->
                    <div class="carousel-item">

                        <!--Grid row-->
                        <div class="row mb-4">

                            <!--Grid column-->
                            @foreach ($products->forPage(1, 3) as $product)
                                <div class="col-lg-4 my-3">
                                    <!--Card-->
                                    <div class="card">

                                        <!--Card image-->
                                        <div class="view overlay hm-white-slight">
                                            <img src="{{$product->screen}}" class="img-fluid" alt="sample image">
                                            <a>
                                                <div class="mask waves-effect waves-light"></div>
                                            </a>
                                        </div>
                                        <!--/.Card image-->

                                        <!--Card content-->
                                        <div class="card-body">
                                            <!--Title-->
                                            <h4 class="card-title">
                                                <strong>№{{$product->id}}</strong>
                                            </h4>
                                            <hr>

                                            <p></p>
                                            <p class="font-small font-bold dark-grey-text mb-1">
                                                <i class="fa fa-clock-o"></i> {{$product->created_at}}</p>
                                            <p class="text-right mb-0 font-small font-bold">
                                                <a href="{{route('prod.view', [$product->id])}}">подробнее
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </p>
                                        </div>
                                        <!--/.Card content-->

                                    </div>
                                    <!--/.Card-->

                                </div>
                            @endforeach
                            <!--Grid column-->
                        </div>
                        <!--/Grid row-->

                    </div>
                    <!--/.First slide-->

                    <!--Second slide-->
                    <div class="carousel-item active">

                        <!--Grid row-->
                        <div class="row mb-4">
                            <!--Grid column-->
                            @foreach ($products->forPage(2, 3) as $product)
                                <div class="col-lg-4 my-3">
                                    <!--Card-->
                                    <div class="card">

                                        <!--Card image-->
                                        <div class="view overlay hm-white-slight">
                                            <img src="{{$product->screen}}" class="img-fluid" alt="sample image">
                                            <a>
                                                <div class="mask waves-effect waves-light"></div>
                                            </a>
                                        </div>
                                        <!--/.Card image-->

                                        <!--Card content-->
                                        <div class="card-body">
                                            <!--Title-->
                                            <h4 class="card-title">
                                                <strong>№{{$product->id}}</strong>
                                            </h4>
                                            <hr>

                                            <p></p>
                                            <p class="font-small font-bold dark-grey-text mb-1">
                                                <i class="fa fa-clock-o"></i> {{$product->created_at}}</p>
                                            <p class="text-right mb-0 font-small font-bold">
                                                <a href="{{route('prod.view', [$product->id])}}">подробнее
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </p>
                                        </div>
                                        <!--/.Card content-->

                                    </div>
                                    <!--/.Card-->

                                </div>
                            @endforeach
                            <!--Grid column-->
                        </div>
                        <!--/Grid row-->
                    </div>
                    <!--/.Second slide-->

                    <!--Third slide-->
                    <div class="carousel-item">

                        <!--Grid row-->
                        <div class="row mb-4">

                            <!--Grid column-->
                            @foreach ($products->forPage(3, 3) as $product)
                                <div class="col-lg-4 my-3">
                                    <!--Card-->
                                    <div class="card">

                                        <!--Card image-->
                                        <div class="view overlay hm-white-slight">
                                            <img src="{{$product->screen}}" class="img-fluid" alt="sample image">
                                            <a>
                                                <div class="mask waves-effect waves-light"></div>
                                            </a>
                                        </div>
                                        <!--/.Card image-->

                                        <!--Card content-->
                                        <div class="card-body">
                                            <!--Title-->
                                            <h4 class="card-title">
                                                <strong>№{{$product->id}}</strong>
                                            </h4>
                                            <hr>

                                            <p></p>
                                            <p class="font-small font-bold dark-grey-text mb-1">
                                                <i class="fa fa-clock-o"></i> {{$product->created_at}}</p>
                                            <p class="text-right mb-0 font-small font-bold">
                                                <a href="{{route('prod.view', [$product->id])}}">подробнее
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </p>
                                        </div>
                                        <!--/.Card content-->

                                    </div>
                                    <!--/.Card-->

                                </div>
                            @endforeach
                            <!--Grid column-->

                        </div>
                        <!--/Grid row-->
                    </div>
                    <!--/.Third slide-->

                </div>
                <!--/.Slides-->

            </div>
            <!--/.Carousel Wrapper-->


        </section>
    </div>
    <!--/.Card-->
</div>
@endsection