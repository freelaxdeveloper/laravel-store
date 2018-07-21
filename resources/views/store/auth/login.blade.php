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
              {!! Form::open(['route' => 'login']) !!}
              @include('components.form.text', [
                'name' => 'email', 
                'title' => 'Моб.телефон&#42;', 
                'icon' => 'phone', 
                'attributes' => [
                  'class' => 'form-control bfh-phone', 
                  'data-format' => '+38 (ddd) ddd-dddd',
                  'placeholder' => 'Ваш моб.телефон',
                  'autofocus',
                ],
              ])
              @include('components.form.password', [
                'name' => 'password', 
                'title' => 'Пароль&#42;', 
                'icon' => 'password',
                'attributes' => [
                  'placeholder' => 'Ваш пароль',
                ]
              ])
              @include('components.form.checkbox', ['name' => 'remember', 'title' => 'Запомнить'])

              @include('components.form.submit', ['title' => 'Авторизоваться'])
              {!! Form::close() !!}
              <div class="sm-margin"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
