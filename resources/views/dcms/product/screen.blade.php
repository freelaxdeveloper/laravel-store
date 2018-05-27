@extends('layouts.app')

@section('title', 'Упрвление фотографиями')

@section('content')
    <form enctype="multipart/form-data" method="post" action="{{ route('prod.screen-save', $product)}}">
        @csrf
        <div class="form-group">
            <label for="imageInput">File input</label>
            <input data-preview="#preview" name="input_img" type="file" id="imageInput">
            <img class="col-sm-6" id="preview"  src="" ></img>
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="form-group">
            <label for="">submit</label>
            <input class="form-control" type="submit">
        </div>
    </form>
    <div class="screens">
        @foreach($product->screens as $key => $src)
            <div class="screen">
                <span class="screen-del"><a href="#">X</a></span>
                <img src="{{ $src }}" alt="" width="240">
            </div>
        @endforeach
    </div>
@endsection