@extends('layouts.app')

@section('title', 'Редактирование №' . $product->id)

@section('content')
    <section class="section extra-margins listing-section mt-2 col-xl-7 col-md-12">
        <h4 class="font-bold"><strong>Редактирование</strong> №{{$product->id}}</h4>
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
                            <form action="{{route('prod.save', [$product->id])}}" method="POST">
                                @csrf
                                <div class="md-form">
                                    <i class="fa fa-usd prefix grey-text"></i>
                                    <input name="price" id="price" type="text" value="{{$product->price}}">
                                    <label for="price">Цена</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-pencil prefix grey-text"></i>
                                    <textarea name='description' type="text" id="replyForm-mess" class="md-textarea">{{$product->description}}</textarea>
                                    <label for="replyForm-mess">Описание</label>
                                </div>
                                <div class="md-form">
                                    <select class="js-example-basic-multiple" name="categories[]" multiple="multiple">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @if (in_array($category->id, $productCategories)) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
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