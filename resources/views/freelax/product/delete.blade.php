@extends('layouts.app')

@section('head')
  @parent

  <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
@endsection

@section('title', 'Упрвление фотографиями')

@section('content')
<div class="col-xl-8 col-md-12">
  {!! Form::model($product, ['route' => ['prod.deleteConfirm', $product]]) !!}

  {!! NoCaptcha::display() !!}

  {!! Form::submit('Подтвердить') !!}

  {!! Form::close() !!}
</div>
@endsection