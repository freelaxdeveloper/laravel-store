@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('head')
    @parent

    <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
@endsection

@section('content')
<!-- Modal -->
<div class="modal fade" id="agreement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>
  
{{-- {{dd(Config::get('sms.test'))}} --}}
    <div class="btn-group btn-breadcrumb">
        <a href="{{route('home')}}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Продолжить покупки</a>
    </div>

    {!! Form::open(['route' => ['basket.oformit-zakaz']]) !!}
    <p><h3>Оформление заказа</h3></p>
    <p class="form-text text-muted">
        В большинстве случаев, оплата заказа производится по факту получения. На некоторые виды товара может понадобиться частичная предоплата. Полные условия оплаты и этапы выполнения заказа Вам сообщат наши менеджеры при обработке заказа в телефонном режиме.
    </p>
    @csrf
    <div class="form-group">
        @php( $first_last = Auth::user()->name ?? null )
        @include('components.form.text', [
            'name' => 'first_last', 
            'title' => 'Имя и фамилия',
            'value' => $first_last,
        ])
    </div>
    <div class="form-group">
        @php( $mobile = Auth::user()->mobile ?? null )
        @include('components.form.text', [
            'name' => 'mobile', 
            'title' => 'Номер телефона',
            'value' => $mobile, 
            'attributes' => [
                'class' => 'form-control bfh-phone', 
                'data-format' => '+38 (ddd) ddd-dddd',
            ],
        ])
        <p class="help-block">Ваш номер телефона не разглашается, и использоуется только для обратной связи и входа в свой личный кабинет</p>
    </div>
    <hr class="red title-hr">
    <p><h4>Адрес доставки</h4></p>
    @include('components.form.select', [
        'name' => 'region',
        'title' => 'Область',
        'items' => $regions->pluck('Description', 'Ref'),
        'empty' => true,
        'attributes' => [
            'class' => 'form-control region'
        ],
    ])
    <div class="form-group">
        <label for="cities">Город:</label>

        <select name="cities" class="form-control cities" disabled="disabled">
            <option>Выберите область</option>
        </select>
    </div>
    <div class="form-group">
        <label for="offices">Отделение №:</label>
        <select name="offices" class="form-control offices" disabled="disabled">
            <option>Выберите город</option>
        </select>
    </div>

    <div class="form-group">
        <div id="datetimepicker3" class="input-append">
            <label>Укажите время в которое с Вами можно связаться:</label><br>
            <div class="form-group">
                C&nbsp; <input data-format="hh:mm:ss" type="text" value="09:00:00"></input>
                <span class="add-on">
                <i data-time-icon="glyphicon glyphicon-time prefix grey-text" data-date-icon="icon-calendar">
                </i>
                </span>
            </div>
        </div>
        <div id="datetimepicker4" class="input-append">
            <div class="form-group">
                по
                <input data-format="hh:mm:ss" type="text" value="20:00:00"></input>
                <span class="add-on">
                <i data-time-icon="glyphicon glyphicon-time prefix grey-text" data-date-icon="icon-calendar">
                </i>
                </span>
            </div>
        </div>

      </div>

    <div class="form-group">
        @include('components.form.textarea', [
            'name' => 'comment', 
            'title' => 'Комментарий к заказу',
            'method' => 'textarea', 
            'attributes' => [
                'placeholder' => 'Не обязательное поле',
            ],
            'required' => false,
        ])
    </div>
    {!! NoCaptcha::display() !!}

    <div class="form-group">
        Подтверждая заказ, Вы принимаете условия пользовательского соглашения <a data-toggle="modal" href="{{ route('agreement', ['view']) }}" data-target="#agreement">пользовательского соглашения</a>
    </div>

    @include('components.form.submit', ['title' => 'Заказать'])
{!! Form::close() !!}
@endsection

@section('right-column')

<div class="panel panel-default">
    <div class="panel-heading"><b>Ваш заказ</b></div>
    <div class="panel-body">
        <div class="products">
            @foreach ($products as $product)
                <div class="product">
                    {{ $product->title }} (<b>{{ number_format($product->price) }}</b> {{ env('CURRENCY') }})
                </div>
            @endforeach
        </div>
        Всего: <b>{{ number_format($products->sum('price')) }}</b> {{ env('CURRENCY') }}
    </div>
</div>

@endsection

@section('js')
    <script src="{{elixir('/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.region').select2({
                placeholder: 'Область',
            });
        });
    </script>

    <script type="text/javascript"
    src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
   </script>
   <script type="text/javascript"
    src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
   </script>
   <script type="text/javascript">
     $(function() {
    $('#datetimepicker3, #datetimepicker4').datetimepicker({
        icons: {
        up: 'glyphicon glyphicon-chevron-up',
        down: 'glyphicon glyphicon-chevron-down'
      },
      pickDate: false,
    });
  });
   </script>
@endsection