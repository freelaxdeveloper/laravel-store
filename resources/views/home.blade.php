@extends('layouts.app')

@section('title', 'Кованые ворота')

@section('slider')
    @include('slider')
@endsection

@section('meta')
<link rel="canonical" href="{{url('/')}}/"/>
@endsection

@section('content')

<!-- Main news -->
<div class="col-xl-7 col-md-12">

        <!--Section: Magazine posts-->
        <section class="section extra-margins listing-section mt-2">
            @php ( $str_title = isset($_GET['page']) ? $_GET['page'] : '1' )
            <h2 class="font-bold"><strong>Лучшее качество на рынке</strong> (стр.{{$str_title}})</h2>
            <hr class="red title-hr">


            <!--Section: Top news-->
            <section>

                <!--Grid row-->
                <div class="row mb-4">
                    @foreach ($products as $product)
                        @include('product.inc.list', ['product' => $product])
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