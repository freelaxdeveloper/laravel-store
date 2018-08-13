@extends('layouts.app')

@section('title', 'Упрвление фотографиями')

@section('content')
<div class="col-xl-8 col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('prod.view', [$product])}}">№{{$product->id}}</a></li>
        </ol>
    </nav>
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
                <span class="screen-del"><a href="{{ route('prod.screenDelete', [$product, $screen['id']]) }}"><i class="fa fa-remove"></i></a></span>
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
</div>
@endsection