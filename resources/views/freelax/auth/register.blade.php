@extends('layouts.app')

@section('meta')
<meta name=”robots” content=”noindex, follow”>
@endsection

@section('title', 'Регистрация')

@section('content')
<div class="col-xl-8 col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Регистрация</div>
                <div class="card-body">
                    <!-- Material form register -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Material input text -->
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input name="name" type="text" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <label for="name">Ваше имя</label>
                        </div>
                    
                        <!-- Material input email -->
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input name="email" type="email" id="email" class="form-control" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <label for="email">Ваш E-mail</label>
                        </div>
                    
                        <!-- Material input email -->
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input name="password" type="password" id="password" class="form-control">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <label for="password">Пароль</label>
                            
                        </div>
                        <!-- Material input password -->
                        <div class="md-form">
                            <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                            <input name="password_confirmation" type="password" id="password-confirm" class="form-control">
                            <label for="password-confirm">Повторите пароль</label>
                        </div>
                    
                        <div class="text-center mt-4">
                            <button class="btn btn-primary" type="submit">Регистрация</button>
                        </div>
                    </form>
                    <!-- Material form register -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
