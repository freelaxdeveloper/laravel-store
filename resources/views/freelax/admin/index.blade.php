@extends('layouts.app')

@section('title', 'Админка')

@section('content')
<div class="col-xl-8 col-md-12">
    <ul>
        <li><a href="{{route('prod.add')}}">Новый товар</a></li>
        <li><a href="{{route('admin.routes')}}">Страницы на сайте</a></li>
        <li><a href="{{route('cat')}}">Управление категориями</a></li>
    </ul>
</div>
@endsection