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
</div>
@endsection
