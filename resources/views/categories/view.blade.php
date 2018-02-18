@extends('layouts.app')

@section('title', $category->name)

@section('content')
    @foreach ($category->getAncestorsAndSelf() as $breadcrumbs)
        {{--  {{$breadcrumbs->name}}   --}}
    @endforeach
    <div class="col-xl-7 col-md-12">

        <!--Section: Magazine posts-->
        <section class="section extra-margins listing-section mt-2">

            <h4 class="font-bold"><strong>{{$category->name}}</strong></h4>
            <hr class="red title-hr">

            <!--Section: Top news-->
            <section>

                <!--Grid row-->
                <div class="row mb-4">

                @foreach ($products as $product)
                    <div class="row single-post mb-4 mr-3">
                        <!--Card-->
                        <div class="card mt-4 mx-3">

                            <div class="view overlay hm-white-slight">
                                <img src="http://oguzov.ru/images/home_gallery_3.jpg" class="img-fluid" alt="sample image">
                                <a href="{{route('prod.view', [$product->slug])}}">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                            </div>
                        </div>
                        <!--/Card-->
                    </div>
                @endforeach
                </div>
                <!--/Grid row-->
            </section>

        </section>
        <!--/Section: Magazine posts-->
    </div>
    <!--/ Main news -->

@endsection