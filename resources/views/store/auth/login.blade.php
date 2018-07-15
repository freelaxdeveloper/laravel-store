@extends('layouts.app')

@section('meta')
<meta name=”robots” content=”noindex, follow”>
@endsection

@section('title', 'Авторизация')

@section('content')
<section id="content">
    <div id="breadcrumb-container">
      <div class="container">
        <ul class="breadcrumb">
          <li>
            <a href="{{ route('home') }}">Домой</a>
          </li>
          <li class="active">Авторизация</li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <header class="content-title">
            <h1 class="title">Войти или Создать аккаунт</h1>
            <div class="md-margin"></div>
          </header>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <h2>Новый клиент</h2>
              <p>Создав учетную запись в нашем магазине, вы сможете быстрее переходить через процесс оформления заказа, хранить несколько адресов доставки, просматривать и отслеживать свои заказы в своей учетной записи и многое другое.</p>
              <div class="md-margin"></div><a class="btn btn-custom-2" href="{{ route('register') }}">Создать аккаунт</a>
              <div class="lg-margin"></div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <h2>Зарегистрированные клиенты</h2>
              <p>Если у вас есть аккаунт у нас, войдите в систему.</p>
              <div class="xs-margin"></div>
              <form action="{{ route('login') }}" id="login-form" method="POST" name="login-form">
                @csrf
                <div class="input-group">
                  <span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text">Моб.телефон&#42;</span></span> <input class="form-control input-lg" placeholder="Ваш моб.телефон" required="" type="text" name="email">
                </div>
                <div class="input-group xs-margin">
                  <span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Пароль&#42;</span></span> <input class="form-control input-lg" placeholder="Ваш пароль" required="" type="password" name="password">
                </div><span class="help-block text-right"><a href="#">Забыли пароль?</a></span> <button class="btn btn-custom-2">Авторизоваться</button>
              </form>
              <div class="sm-margin"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
