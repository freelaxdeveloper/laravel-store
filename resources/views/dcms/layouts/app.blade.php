<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
	@section('head')
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		@yield('meta')
		<title>@yield('title')</title>

		<link rel="icon" type="image/x-icon" href="/favicon.ico" />

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="canonical" href="{{ url()->current() }}"/>
		
		<!-- Bootstrap Core CSS -->
		@section('css')
			<link href="{{elixir('/css/dcmsx.css')}}" rel="stylesheet">
			<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		@show

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	@show
</head>

<body>

<!-- Modal -->
<div class="modal fade" id="basket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

	</div>
  </div>
</div>

<div class="wrapper">
	@yield('menu-left')

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="{{route('home')}}?{{ request()->getQueryString() }}"><img src="/images/logo.png" alt="" width="135px"></a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse bs-dark" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
						@php( $basketCounter = order()->count() )
						<a id="myBasket" data-toggle="modal" href="{{ route('basket', ['view']) }}" data-target="#basket">
							<i class="glyphicon glyphicon-shopping-cart"></i> Моя корзина 
							<span id="basket-counter" class="@if( $basketCounter ) basket-counter @else hide @endif">{{ $basketCounter }}</span>
						</a>
                    </li>
                   {{--  <li>
                        <a href="#">Загруз-центр</a>
                    </li> --}}
					{{-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Разделы <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="{{route('users.list')}}">Пользователи</a></li>
							<li><a href="#">Pontificate</a></li>
							<li><a href="#">Synergize</a></li>
						</ul>
					</li>    --}} 
				</ul>
				@auth
				<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle navbar-img" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						  Кабинет 
						  {{-- <img src="{{Auth::user()->avatar}}" class="img-circle" alt="Profile Image" /> --}}
						  </a>
						  <ul class="dropdown-menu">
								<li><a href="{{ route('user.my') }}">Мой кабинет</a></li>
								{{-- <li><a href="#">Почта</a></li> --}}
								<li role="separator" class="divider"></li>
								{{-- <li><a href="{{route('photo.upload', [Auth::user()->id])}}">Мои фото</a></li> --}}
								{{-- <li><a href="#">Настройки</a></li> --}}
								<li><a href="{{ route('logout') }}"
									onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();">Выйти</a></li>
								@auth('admin'))
									<li><a href="{{route('admin.index')}}">Админка</a></li>
								@endauth
						  </ul>
						</li>
					  </ul>
					  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>

				@else
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle navbar-img" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						  Кабинет 
						  {{-- <img src="https://cdn4.iconfinder.com/data/icons/avatar-and-user/86/Avatar_person_user_character_man_woman_human-04-512.png" class="img-circle" alt="Profile Image" /> --}}
						  </a>
						  <ul class="dropdown-menu">
							<li><a href="{{ route('register') }}">Регистрация</a></li>
							<li><a href="{{ route('login') }}">Авторизация</a></li>
						  </ul>
						</li>
					  </ul>
				@endauth
				<form class="navbar-form navbar-right form-inline" role="search">
						<div class="input-group">
						   <input type="text" class="search-box" placeholder="Поиск">
						   <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
						</div>
				</form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
	</nav>
<div class="container-fluid">
		<nav class="nav-menu">
			<ul>
				<li>
					<a href="{{ route('home') }}">
						<i class="category0"></i>
						Главная
					</a>
				</li>
				@each('categories.treeMenu.listing', $categories, 'category')
			</ul>
		</nav>

		

			<div class="row flex">
			<!-- Left Column -->
			{{-- <div class="col-sm-12 col-lg-2">
				@section('left')
					<!-- List-Group Panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 class="panel-title"><span class="glyphicon glyphicon-random"></span> Категории</h1>
						</div>
						<div class="list-group">
							@each('categories.tree.listing', $categories, 'category')
						</div>
					</div>
				@endsection
			</div><!--/Left Column--> --}}


			<!-- Center Column -->
			<div class="col-xs-12 col-sm-8 col-lg-8">
			
				@if ($errors->any())
					@foreach ($errors->all() as $error)
						<!-- Alert -->
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{!! $error !!}
						</div>		
					@endforeach
				@endif

				@if (session('status'))
					@php( $messages = session('status') )
					@if(!is_array($messages))
						@php($messages = [$messages])
					@endif
					@foreach( $messages as $msg )
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{!! $msg !!}
						</div>
					@endforeach
				@endif

				<div class="content">
					@yield('content')
				</div>
			</div><!--/Center Column-->
			<!-- Right Column -->
			<div class="col-xs-12 col-sm-4 col-lg-3">

				@section('right')
					@if (!empty($actions))
						<div class="panel panel-primary">
							<div class="panel-heading">Действия</div>
							<div class="list-group">
								@foreach ($actions as $action)
									<a href="{{$action['link']}}" class="list-group-item">{{$action['title']}}</a>
								@endforeach
							</div>
						</div>
					@endif

					@yield('right-column')
					<div class="panel panel-default">
						<div class="panel-heading"><b>Доставка</b></div>
						<div class="list-group">
							<div class="list-group-item">
								Киев <span class="badge">180 грн</span>
							</div>
							<div class="list-group-item">
								Белая Церковь <span class="badge">90 грн</span>
							</div>
							<div class="list-group-item">
								Бровары, Боярка, Ирпень <span class="badge">205 грн</span>
							</div>
							<div class="list-group-item">
								Борисполь, Обухов, Васильков <span class="badge">215 грн</span>
							</div>
							<div class="list-group-item">
								Одесса, Николаев, Умань, Жашков <span class="badge">250 грн</span>
							</div>
						
							<div class="list-group-item">
								Чернигов <span class="badge">250 грн</span>
							</div>
							<div class="list-group-item">
								<h5>В другие регионы доставка осуществляется перевозчиком Новая Почта по их тарифам.<br />
								Стоимость заноса на этаж (при отсутствии лифта) и сборки уточняйте у менеджера.</h5>
							</div>
						</div>
					</div>
					
					@if ('prod.view' != Route::currentRouteName())
						{{-- @include('chat.chat-panel') --}}
					@endif

					@auth
							{{-- <div class="row">
								<div class="col-sm-12">
						
									<div class="card hovercard">
										<div class="cardheader">
						
										</div>
										<div class="avatar">
											<img alt="" src="{{Auth::user()->avatar}}">
										</div>
										<div class="info">
											<div class="title">
												<a href="{{route('user.view', [Auth::user()->id])}}">{{ Auth::user()->name }}</a>
											</div>
											@forelse (Auth::user()->roles as $role)
												<div class="desc">{{$role->name}}</div>
											@empty
												<div class="desc">Пользователь</div>
											@endforelse
										</div>
										<div class="bottom">
											<a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
												<i class="fa fa-twitter"></i>
											</a>
											<a class="btn btn-danger btn-sm" rel="publisher"
											href="https://plus.google.com/+ahmshahnuralam">
												<i class="fa fa-google-plus"></i>
											</a>
											<a class="btn btn-primary btn-sm" rel="publisher"
											href="https://plus.google.com/shahnuralam">
												<i class="fa fa-facebook"></i>
											</a>
											<a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
												<i class="fa fa-behance"></i>
											</a>
										</div>
									</div>
						
								</div>
						
							</div> --}}
					@endauth
				@show
			</div><!--/Right Column -->

		</div><!--/container-fluid-->

	<footer>       
		<div class="small-print">
				<p>&copy; T-Mebel 2018 </p>
				<p class="mobile-flex"><a href="#">Правила</a> <a data-toggle="modal" href="{{ route('agreement', ['view']) }}" data-target="#basket">Соглашение</a> <a href="#">Контакты</a></p>
		</div>
	</footer>
	</div>	

	@yield('info')

	
	<script src="{{elixir('/js/dcmsx.js')}}"></script>
	@yield('js')

</div> <!-- end wrapper -->
</body>

</html>
