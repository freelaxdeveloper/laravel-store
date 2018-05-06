@extends('layouts.app')

@section('title', 'Админка')

@section('content')

    <ul>
        <li><a href="{{route('admin.routes')}}">Страницы на сайте</a></li>
    </ul>

@endsection