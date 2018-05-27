@extends('layouts.app')

@section('title', 'Редактирование №' . $product->id)

@section('content')
    <section class="section extra-margins listing-section mt-2 col-xl-7 col-md-12">
        <div class="row">
            <div class="btn-group btn-breadcrumb">
                <a href="{{ route('home') }}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="{{ route('prod.view', [$product]) }}" class="btn btn-primary">{{$product->title}}</a>
            </div>
        </div>

        <hr class="red title-hr">
        <section class="mb-4 mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-12">

                        <!--Leave a reply form-->
                        <div class="reply-form">
                            <form action="{{route('prod.save', [$product])}}" method="POST" role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input name="title" type="text" class="form-control" value="{{$product->title}}">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <label for="price">Цена</label>
                                            <input name="price" type="text" class="form-control" value="{{$product->price}}">
                                        </div>
                                        <div class="col-xs-2">
                                            <label for="price_old">Старая цена</label>
                                            <input name="price_old" type="text" class="form-control" value="{{$product->price_old}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <label for="price">Длина</label>
                                            <input name="options[size][length]" type="text" class="form-control" value="{{$product->options['size']['length']}}">
                                        </div>
                                        <div class="col-xs-2">
                                            <label for="price_old">Высота</label>
                                            <input name="options[size][height]" type="text" class="form-control" value="{{$product->options['size']['height']}}">
                                        </div>
                                        <div class="col-xs-3">
                                            <label for="type">Ширина</label>
                                            <input name="options[size][width]" class="form-control" type="text" value="{{$product->options['size']['width']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="replyForm-mess">Описание</label>
                                    <textarea class="form-control" rows="3" name='description'>{{$product->description}}</textarea>
                                    <label for="meta_description">Описание (META)</label>
                                    <textarea name="meta_description" type="text" class="form-control" rows="3">{{$product->meta_description}}</textarea>
                                </div>
                                    <div class="form-group">
                                        <label>Категории</label>
                                        <select class="form-control" name="categories[]" multiple="multiple">
                                            @foreach ($categoriesAll as $category)
                                                <option value="{{$category->id}}" @if (in_array($category->id, $productCategories)) selected @endif>
                                                    @foreach ($category->getAncestorsAndSelf() as $breadcrumbs)
                                                        {{$breadcrumbs->name}}/
                                                    @endforeach
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Сохранить</button>
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