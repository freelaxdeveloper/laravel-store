@extends('layouts.app')

@section('title', 'Профиль - ' . $user->name)

@section('content')
    <p><img src="{{$user->avatar}}" /></p>
    <p>{{$user->name}}</p>
@endsection