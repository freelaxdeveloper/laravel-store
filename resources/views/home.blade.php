@extends('layouts.app')

@section('title', 'Кованые ворота')

@section('slider')
    {{--  @include('slider')  --}}
@endsection

@section('content')

<!-- Main news -->
<div class="col-xl-7 col-md-12">

        <!--Section: Magazine posts-->
        <section class="section extra-margins listing-section mt-2">
            @php ( $str_title = isset($_GET['page']) ? $_GET['page'] : '1' )
            <h4 class="font-bold"><strong>Лучшее качество на рынке</strong> (стр.{{$str_title}})</h4>
            <hr class="red title-hr">


            <!--Section: Top news-->
            <section>

                <!--Grid row-->
                <div class="row mb-4">

                    @foreach ($products as $product)
                        <div class="row single-post mb-4 mr-3">
                            <!--Card-->
                            <div class="card mt-4 mx-3">

                                <!--Card image-->
                                <div class="view overlay hm-white-slight">
                                    <img src="{{$product->screen}}" class="img-fluid" alt="sample image">
                                    <a href="{{route('prod.view', [$product->id])}}">
                                        <div class="mask waves-effect waves-light"></div>
                                    </a>
                                </div>
                                <!--/Card image-->

                                <!-- Card footer -->
                                <div class="card-data">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-clock-o"></i> {{$product->created_at}}</li>
                                    </ul>
                                </div>
                                <!-- Card footer -->
                            </div>
                            <!--/Card-->
                        </div>

                    @endforeach
                </div>
                <!--/Grid row-->
            </section>

        </section>
        <!--/Section: Magazine posts-->

        <!--Pagination dark-->
        {{ $products->links() }}
        <!--/Pagination dark grey-->

    </div>
    <!--/ Main news -->
@endsection