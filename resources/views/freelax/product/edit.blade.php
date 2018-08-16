@extends('layouts.app')

@isset($product)
    @section('title', 'Редактирование №' . $product->id)
@endisset

@section('content')
    <section class="section extra-margins listing-section mt-2 col-xl-7 col-md-12">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>

                @isset($product)
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('prod.view', [$product])}}">№{{$product->id}}</a></li>
                @endisset
            </ol>
        </nav>

        {{-- <h4 class="font-bold">
            @isset($product)
                <strong>Редактирование</strong> №{{$product->id}}
            @endisset
        </h4> --}}
        <hr class="red title-hr">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <section class="mb-4 mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-12">

                        <!--Leave a reply form-->
                        <div class="reply-form">
                            {{-- <form action="{{route('prod.save', [$product->id])}}" method="POST"> --}}
                            @if ( isset($product) )
                                {!! Form::model($product, ['route' => ['prod.save', $product]]) !!}
                            @else
                                {!! Form::open(['route' => ['prod.new', $category]]) !!}
                            @endif
                                {{-- @csrf --}}
                                <div class="row">
                                    <div class="md-form">
                                        <i class="fa fa-rub prefix grey-text"></i>
                                        {!! Form::text('price', null) !!}
                                        <label for="price">Цена от</label>
                                    </div>
                                    <div class="md-form">
                                        {!! Form::text('price_old', null) !!}
                                        <label for="price">Цена до</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="md-form">
                                        <i class="fa fa-rub prefix grey-text"></i>
                                        {!! Form::text('options[estimated_price][from]', null) !!}
                                        <label for="estimated_price_from">Ориентир. цена от</label>
                                    </div>
                                    <div class="md-form">
                                        {!! Form::text('options[estimated_price][before]', null) !!}
                                        <label for="estimated_price_before">Ориентир. цена до</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="md-form">
                                        {!! Form::text('options[size][goal]', null) !!}
                                        <label for="price">Размер ворот</label>
                                    </div>
                                    <div class="md-form">
                                        {!! Form::text('options[size][gate]', null) !!}
                                        <label for="price">Размер калитки</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="md-form">
                                        <i class="fa fa-pencil prefix grey-text"></i>
                                        {!! Form::textarea('description', null, ['class' => 'md-textarea']) !!}
                                        <label for="replyForm-mess">Описание</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-pencil prefix grey-text"></i>
                                        {!! Form::textarea('meta_description', null, ['class' => 'md-textarea']) !!}
                                        <label for="meta_description">Описание (META)</label>
                                    </div>
                                    <!-- Material checked -->
                                    <div class="form-check">
                                        <input name="options[running_meter]" type="checkbox" class="form-check-input" id="materialChecked2" style="display:none;" @isset($product->options['running_meter']) checked @endisset>
                                        <label class="form-check-label" for="materialChecked2">За погонный метр</label>
                                    </div>                                
                                </div>                                
                                <div class="md-form">
                                    {!! Form::select('categories[]', $categoriesAll->pluck('name', 'id'), null, ['multiple' => 'multiple', 'class' => 'js-example-basic-multiple']) !!}
                                </div>


                                <div class="text-center">
                                    <button class="btn btn-indigo btn-rounded">Сохранить</button>
                                </div>
                            </form>
                        </div>
                        <!--/.Leave a reply form-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
    </section>
@endsection