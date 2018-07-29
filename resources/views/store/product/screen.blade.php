@extends('layouts.app')

@section('title', 'Упрвление фотографиями')

@section('content')
    <div id="breadcrumb-container">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Главная</a>
                </li>
                <li class="active">
                    <a href="{{ route('prod.view', [$product]) }}">{{$product->title}}</a>
                </li>
            </ul>
        </div>
    </div>   
    <hr class="red title-hr">
    <form class="form" enctype="multipart/form-data" method="post" action="{{ route('prod.screen', $product)}}">
        @csrf
        <div class="form-group">
            <input name="input_img[]" type="file">
        </div>
        <div class='form-group'>
            <button class="btn btn-upload" onclick='$(this).parents(".form-group").before($(this).parents(".form-group").prev().clone()); return false;'>Добавить еще</button>
            <input class="btn btn-default" type="submit" value="Загрузить">
        </div>
    </form>

    <div class="screens">
        @foreach($product->screens as $screen)
            @if ( 'default' == $screen['filename'] )
                @continue
            @endif
            <div class="screen">
                <span class="screen-del"><a href="{{ route('prod.screenDelete', [$product, $screen['id']]) }}"><i class="glyphicon glyphicon-remove"></i></a></span>
                @if( $loop->last )
                    <div class="title">Основной</div>
                @endif
                <div><img src="{{ $screen['src'] }}" alt="" width="240"></div>
                <div>
                    @if( !$loop->last )
                        <a href="{{ route('prod.screenHightlight', [$product, $screen['id']]) }}" class="title">Сделать основным</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection