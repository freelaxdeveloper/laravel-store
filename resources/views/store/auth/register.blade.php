@extends('layouts.app')

@section('meta')
  <meta name=”robots” content=”noindex, follow”>
@endsection

@section('title', 'Регистрация')

@section('content')
  <section id="content">
    <div id="breadcrumb-container">
      <div class="container">
        <ul class="breadcrumb">
          <li>
            <a href="{{ route('home') }}">Домой</a>
          </li>
          <li class="active">Регистрация Аккаунта</li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <header class="content-title">
            <h1 class="title">Регистрация Аккаунта</h1>
            <p class="title-desc">Если у вас уже есть учетная запись, войдите в систему на <a href="{{ route('login') }}">странице авторизации</a>.</p>
          </header>
          <div class="xs-margin"></div>
          {!! Form::open(['route' => 'register']) !!}
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <fieldset>
                <h2 class="sub-title">Ваши персональные данные</h2>
                @include('components.form.text', [
                  'name' => 'name', 
                  'title' => 'Ф.И.О&#42;', 
                  'icon' => 'user', 
                  'attributes' => [
                    'autofocus',
                    'placeholder' => 'Фамилия Имя Отчество',
                  ],
                ])
                @include('components.form.text', [
                  'name' => 'mobile', 
                  'title' => 'Моб.телефон&#42;', 
                  'icon' => 'phone', 
                  'attributes' => [
                    'class' => 'form-control bfh-phone', 
                    'data-format' => '+38 (ddd) ddd-dddd',
                    'placeholder' => 'Мобильный номер телефона',
                  ],
                ])
                @include('components.form.text', [
                  'name' => 'email', 
                  'title' => 'Эл.адрес', 
                  'icon' => 'email', 
                  'required' => false,
                  'attributes' => [
                    'placeholder' => 'E-mail',
                  ],
                ])
              </fieldset>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <fieldset>
                <h2 class="sub-title">Придумайте сложный пароль</h2>
                @include('components.form.password', [
                  'name' => 'password', 
                  'title' => 'Пароль&#42;', 
                  'icon' => 'password', 
                  'attributes' => [
                    'placeholder' => 'Сложный пароль',
                  ],
                ])
                @include('components.form.password', [
                  'name' => 'password_confirmation', 
                  'title' => 'Повторите&#42;', 
                  'icon' => 'password', 
                  'attributes' => [
                    'placeholder' => 'Повторите Ваш сложный пароль еще раз',
                  ],
                ])
              </fieldset>
            </div>
          </div>
          @include('components.form.submit', ['title' => 'Создать учетную запись'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </section>
@endsection
