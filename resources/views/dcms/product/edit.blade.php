@extends('layouts.app')

@if ( isset($product) )
    @section('title', 'Редактирование №' . $product->id)
@else
    @section('title', 'Добавление товара в - ' . $category->name)
@endif

@section('menu-left')
	@include('components.actions', $actions)
@endsection

@section('content')
    <section class="section extra-margins listing-section mt-2 col-xl-7 col-md-12">
        <div class="row">
            <div class="btn-group btn-breadcrumb">
                @if ( isset($product) )
                    <a href="{{ route('home') }}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                    <a href="{{ route('prod.view', [$product]) }}" class="btn btn-primary">{{$product->title}}</a>
                @else
                    <a href="{{route('home')}}" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                    <a href="{{ URL::previous() }}" class="btn btn-primary">Вернуться</a>
                @endif
            </div>
        </div>

        <hr class="red title-hr">
        <section class="mb-4 mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-12">

                        <!--Leave a reply form-->
                        <div class="reply-form">
                            @if ( isset($product) )
                                {!! Form::model($product, ['route' => ['prod.save', $product]]) !!}
                            @else
                                {!! Form::open(['route' => ['prod.new', $category]]) !!}
                            @endif
                            
                                @include('components.form.text', [
                                    'name' => 'title', 
                                    'title' => 'Название',
                                ])
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            @include('components.form.text', [
                                                'name' => 'price', 
                                                'title' => 'Цена', 
                                            ])
                                        </div>
                                        <div class="col-xs-2">
                                            @include('components.form.text', [
                                                'name' => 'price_old', 
                                                'title' => 'Старая цена',
                                                'required' => false,
                                            ])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            @include('components.form.text', [
                                                'name' => 'options[size][length]', 
                                                'title' => 'Длина',
                                                'required' => false,
                                            ])
                                        </div>
                                        <div class="col-xs-2">
                                            @include('components.form.text', [
                                                'name' => 'options[size][height]', 
                                                'title' => 'Высота',
                                                'required' => false,
                                            ])
                                        </div>
                                        <div class="col-xs-3">
                                            @include('components.form.text', [
                                                'name' => 'options[size][width]', 
                                                'title' => 'Ширина',
                                                'required' => false,
                                            ])
                                        </div>
                                    </div>
                                </div>
                                @include('components.form.textarea', [
                                    'name' => 'description', 
                                    'title' => 'Описание',
                                    'method' => 'textarea', 
                                    'attributes' => [
                                        'rows' => 3,
                                        'tinymce',
                                    ],
                                    'required' => false,
                                ])
                                @include('components.form.textarea', [
                                    'name' => 'meta_description', 
                                    'title' => 'Описание (META)',
                                    'method' => 'textarea', 
                                    'attributes' => [
                                        'rows' => '3',
                                    ],
                                    'required' => false,
                                ])
                                @include('components.form.select', [
                                    'name' => 'categories[]',
                                    'title' => 'Категории',
                                    'items' => $categoriesAll->pluck('name', 'id'),
                                    'attributes' => [
                                        'multiple' => 'multiple',
                                    ],
                                ])
                                @include('components.form.submit', ['title' => 'Сохранить'])
                            {!! Form::close() !!}
                        </div>
                        <!--/.Leave a reply form-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
    </section>
@endsection

@section('js')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8tdlfa0wenwav42mprv1nlsgo33l5nufbbb2cwkwo2qazwpy"></script>

<script>
    tinymce.init({
    selector: 'textarea[tinymce]',
    height: 400,
    menubar: false,
    language_url: '{{ elixir("js/tinymce_ru.js") }}',
    plugins: [
        'emoticons codesample advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code help wordcount'
    ],
    // bbcode_dialect: "punbb",
    toolbar: 'emoticons | codesample | insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | preview | image code',

    // without images_upload_url set, Upload tab won't show up
    // images_upload_url: '/postAcceptor.php',
    images_upload_credentials: true,

    images_upload_handler: function (blobInfo, success, failure) {
    var xhr, formData;
    var webPath = '{{route("screen_save_test", [$product])}}';
    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', webPath);
    xhr.onload = function() {
      var json;

      if (xhr.status != 200) {
        failure('HTTP Error: ' + xhr.status);
        return;
      }
      json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
      }
      success(json.location);
    };
    formData = new FormData();
    formData.set('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('file', blobInfo.blob(), (blobInfo));
    xhr.send(formData);
  },

    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });
</script>
@endsection