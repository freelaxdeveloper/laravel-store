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

                    {!! Form::open(['route' => 'login']) !!}

                    @include('form.text', [
                        'name' => 'email', 
                        'title' => 'Номер телефона', 
                        'icon' => 'envelope', 
                        'attributes' => [
                            'class' => 'form-control bfh-phone', 
                            'data-format' => '+38 (ddd) ddd-dddd',
                            'autofocus',
                        ],
                    ])
                    @include('form.password', [
                        'name' => 'password', 
                        'title' => 'Пароль', 
                        'icon' => 'lock',
                    ])

                    @include('form.checkbox', ['name' => 'remember', 'title' => 'Запомнить'])

                    @include('form.submit', ['title' => 'Авторизация'])

                    {!! Form::close() !!}

               </div>
            </div>
        </div>
    </div>
</div>
@endsection
