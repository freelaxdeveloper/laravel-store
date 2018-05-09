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
                            <form action="{{route('prod.save', [$product->id])}}" method="POST" role="form">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <label for="price">Цена</label>
                                            <input name="price" type="text" class="form-control" value="{{$product->price}}">
                                        </div>
                                        <div class="col-xs-3">
                                            <label for="type">Подпись</label>
                                            <input name="type" class="form-control" type="text" value="{{$product->type}}">
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