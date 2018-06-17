@extends('layouts.app')

@section('meta')
<meta name=”robots” content=”noindex, follow”>
@endsection

@section('title', 'Регистрация')

@section('content')
<div class="container">
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
                            <i class="fa fa-user prefix grey-text"></i> <label for="name">Ваше имя</label>
                            <input name="name" type="text" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            
                        </div>
                    
                        <!-- Material input email -->
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i> <label for="email">Ваш E-mail</label>
                            <input name="email" type="email" id="email" class="form-control" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>
                    
                    
                        <!-- Material input mobile -->
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i> <label for="mobile">Ваш номер телефона</label>
                            <input name="mobile" type="text" id="mobile" class="form-control bfh-phone" data-format="+38 (ddd) ddd-dddd" value="{{ old('mobile') }}" required>
                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                            @endif
                            
                        </div>
                    
                        <!-- Material input email -->
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i> <label for="password">Пароль</label>
                            <input name="password" type="password" id="password" class="form-control">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                            
                        </div>
                        <!-- Material input password -->
                        <div class="md-form">
                            <i class="fa fa-exclamation-triangle prefix grey-text"></i> <label for="password-confirm">Повторите пароль</label>
                            <input name="password_confirmation" type="password" id="password-confirm" class="form-control">
                            
                        </div>
                    
                        <div>
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
