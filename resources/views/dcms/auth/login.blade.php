@extends('layouts.app')

@section('meta')
<meta name=”robots” content=”noindex, follow”>
@endsection

@section('title', 'Авторизация')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Авторизация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i> <label for="email">Номер телефона</label>
                            <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} bfh-phone" data-format="+38 (ddd) ddd-dddd" name="email" value="{{ old('email') }}" required autofocus>
                            <p class="help-block">Ваш номер телефона не разглашается, и использоуется только для обратной связи и входа в свой личный кабинет</p>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                            

                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i> <label for="password">Пароль</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="col-md-6 offset-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Авторизация
                                </button>

                                {{--  <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>  --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
