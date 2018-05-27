@extends('layouts.app')

@section('title', 'Упрвление фотографиями')

@section('content')
    <form class="form" enctype="multipart/form-data" method="post" action="{{ route('prod.screen', $product)}}">
        @csrf
        <div class="form-group">
            <label for="imageInput">Файл</label>
            <input name="input_img[]" type="file">
        </div>
        <div class='form-group'>
            <button class="btn btn-upload" onclick='$(this).parents(".form-group").before($(this).parents(".form-group").prev().clone()); return false;'>Добавить еще</button>
        </div>
        <input class="btn btn-default" type="submit" value="Загрузить">
    </form>

    <div class="screens">
            {{-- {{dd($product->screens->all()->first()['src'])}} --}}
        @foreach($product->screens as $screen)
        {{-- {{dd($screen)}} --}}
            @if ( 'default' == $screen['filename'] )
                @continue
            @endif
            <div class="screen">
                <span class="screen-del"><a href="{{ route('prod.screenDelete', [$product, $screen['id']]) }}"><i class="glyphicon glyphicon-remove"></i></a></span>
                <img src="{{ $screen['src'] }}" alt="" width="240">
            </div>
        @endforeach
    </div>
@endsection