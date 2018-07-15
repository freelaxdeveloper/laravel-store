@extends('layouts.app')

@section('meta')
<meta name=”robots” content=”noindex, follow”>
@endsection

@section('title', 'Регистрация')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Регистрация</div>
                <div class="card-body">

                    {!! Form::open(['route' => 'register']) !!}
                        @include('components.form.text', [
                            'name' => 'name', 
                            'title' => 'Ваше имя', 
                            'icon' => 'user', 
                            'attributes' => [
                                'autofocus',
                            ],
                        ])

                        @include('components.form.text', [
                            'name' => 'mobile', 
                            'title' => 'Ваш номер телефона', 
                            'icon' => 'envelope', 
                            'attributes' => [
                                'class' => 'form-control bfh-phone', 
                                'data-format' => '+38 (ddd) ddd-dddd',
                            ],
                        ])

                        @include('components.form.password', [
                            'name' => 'password', 
                            'title' => 'Пароль', 
                            'icon' => 'lock',
                        ])

                        @include('components.form.password', [
                            'name' => 'password_confirmation', 
                            'title' => 'Повторите пароль', 
                            'icon' => 'exclamation-triangle',
                        ])
                    
                        @include('components.form.submit', ['title' => 'Регистрация'])
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div> --}}
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
          <form action="{{ route('register') }}" id="register-form" name="register-form">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <fieldset>
                  <h2 class="sub-title">Ваши персональные данные</h2>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Имя&#42;</span></span> <input class="form-control input-lg" placeholder="Ваше имя" required="" type="text">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Фамилия&#42;</span></span> <input class="form-control input-lg" placeholder="Ваша фамилия" required="" type="text">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Эл.адрес&#42;</span></span> <input class="form-control input-lg" placeholder="Ваш e-mail" required="" type="text">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text">Моб.телефон&#42;</span></span> <input class="form-control input-lg" placeholder="Ваш мобильный телефон" required="" type="text">
                  </div>
                </fieldset>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <fieldset>
                    <h2 class="sub-title">Придумайте сложный пароль</h2>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Пароль&#42;</span></span> <input class="form-control input-lg" placeholder="Сложный пароль" required="" type="password">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Повторите&#42;</span></span> <input class="form-control input-lg" placeholder="Повторите Ваш сложный пароль еще раз" required="" type="password">
                    </div>
                  </fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <fieldset class="half-margin">
                  <h2 class="sub-title">Новостная рассылка</h2>
                  <div class="input-group custom-checkbox input-desc-box">
                    <span class="input-group-addon no-minwidth">
                        <input type="checkbox"> <span class="checbox-container"><i class="fa fa-check"></i></span>
                    </span> Я хочу подписаться на информационный бюллетень ТМебель.
                  </div>
                  <div class="input-group custom-checkbox">
                    <input type="checkbox"> <span class="checbox-container"><i class="fa fa-check"></i></span> Я согласен с <a href="register-account.html#">Политикой конфиденциальности</a>.
                  </div>
                </fieldset><input class="btn btn-custom-2 md-margin" type="submit" value="Создать учетную запись">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>



@endsection
