@extends('layouts.app')

@section('title', 'Добавление товара в - ' . $category->name)

@section('content')
<div class="row">
    <div class="btn-group btn-breadcrumb">
        <a href="{{route('home')}}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Вернуться</a>
    </div>
</div>
<h2 class="font-bold"><strong>Добавление товара в "{{$category->name}}"</strong></h2>
<hr class="red title-hr">
<section class="mb-4 mt-4">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-12">

                <!--Leave a reply form-->
                <div class="reply-form">
                    <form action="{{route('prod.new', [$category])}}" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input name="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2">
                                    <label for="price">Цена</label>
                                    <input name="price" type="text" class="form-control">
                                </div>
                                <div class="col-xs-2">
                                    <label for="price_old">Старая цена</label>
                                    <input name="price_old" type="text" class="form-control">
                                </div>
                                <div class="col-xs-3">
                                    <label for="type">Подпись</label>
                                    <input name="type" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="replyForm-mess">Описание</label>
                            <textarea class="form-control" rows="3" name='description'></textarea>
                            <label for="meta_description">Описание (META)</label>
                            <textarea name="meta_description" type="text" class="form-control" rows="3"></textarea>
                        </div>
                            <div class="form-group">
                                <label>Категории</label>
                                <select class="form-control" name="categories[]" multiple="multiple">
                                    @foreach ($categoriesAll as $cat)
                                        <option value="{{$cat->id}}" @if($cat->id == $category->id)selected @endif>
                                            @foreach ($cat->getAncestorsAndSelf() as $breadcrumbs)
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

@endsection