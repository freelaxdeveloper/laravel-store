@extends('layouts.app')

@section('head')
  @parent

  <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
@endsection

@section('menu-left')
	@include('components.actions', $actions)
@endsection

@section('title', 'Упрвление фотографиями')

@section('content')
  {!! Form::model($product, ['route' => ['prod.deleteConfirm', $product]]) !!}

  {!! NoCaptcha::display() !!}

  @include('components.form.submit', ['title' => 'Подтвердить'])

  {!! Form::close() !!}
@endsection