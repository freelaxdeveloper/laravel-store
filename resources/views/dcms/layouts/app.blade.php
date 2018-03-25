<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	@yield('meta')
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
	<link href="{{elixir('dcmsx/css/core.css')}}" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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
				<a class="navbar-brand" href="{{route('home')}}"><span class="glyphicon glyphicon-globe"></span> DCMSX</a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse bs-dark" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Форум</a>
                    </li>
                    <li>
                        <a href="#">Загруз-центр</a>
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="#">Engage</a></li>
							<li><a href="#">Pontificate</a></li>
							<li><a href="#">Synergize</a></li>
						</ul>
					</li>    
				</ul>
				@auth
				<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle navbar-img" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						  Кабинет 
						  <img src="http://lorempixel.com/100/100/people/9/" class="img-circle" alt="Profile Image" />
						  </a>
						  <ul class="dropdown-menu">
							<li><a href="#">Профиль</a></li>
							<li><a href="#">Почта</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Настройки</a></li>
							<li><a href="{{ route('logout') }}"
								onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();">Выйти</a></li>
						  </ul>
						</li>
					  </ul>
					  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
				@endauth
				<form class="navbar-form navbar-right form-inline" role="search">
						<div class="input-group">
						   <input type="text" class="search-box" placeholder="Search">
						   <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
						</div>
				</form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
	</nav>
		<div class="container-fluid">
			<div class="row">
			<!-- Left Column -->
			<div class="col-sm-2">

				<!-- List-Group Panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title"><span class="glyphicon glyphicon-random"></span> Категории</h1>
					</div>
					<div class="list-group">
						@foreach ($categories as $category)
							<a href="{{route('cat.view', [$category->slug])}}" class="list-group-item">{{$category->name}} <span class="badge">{{$category->products_count}}</span></a>
						@endforeach
					</div>
				</div>

				<!-- Text Panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title"><span class="glyphicon glyphicon-cog"></span> О сайте</h1>
					</div>

					<div class="panel-body">
						<p>Сайт находится в разработке, о всех найденных ошибках сообщите на email Sanek_OS9@yahoo.com</p>
					</div>
				</div>
			
			</div><!--/Left Column-->


			<!-- Center Column -->
			<div class="col-sm-7">
			
				@if ($errors->any())
					@foreach ($errors->all() as $error)
						<!-- Alert -->
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{ $error }}
						</div>		
					@endforeach
				@endif
				@if (session('status'))
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						{{ session('status') }}
					</div>		
				@endif

				@yield('content')
			</div><!--/Center Column-->


			<!-- Right Column -->
			<div class="col-sm-3">
				<div class="row-chat">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<span class="glyphicon glyphicon-comment"></span> Мини-Чат
										<div class="btn-group pull-right">
											<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<span class="glyphicon glyphicon-chevron-down"></span>
											</button>
											<ul class="dropdown-menu slidedown">
												<li><a href="#"><span class="glyphicon glyphicon-refresh">
												</span>Обновить</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-remove">
												</span>Очистить</a></li>
												<li class="divider"></li>
												<li><a href="#"><span class="glyphicon glyphicon-off"></span>
													Выйти</a></li>
											</ul>
										</div>
									</div>
									<div class="panel-body">
										<ul class="chat">
											@foreach ($chats as $chat)
												@php
													$class = Auth::user() && $chat->user->id == Auth::user()->id ? 'right' : 'left';
													$avatar = Auth::user() && $chat->user->id == Auth::user()->id ? 'http://lorempixel.com/50/50/people/9/' : 'http://lorempixel.com/50/50/people/7/';
												@endphp
												<li class="{{$class}} clearfix">
													<span class="chat-img pull-{{$class}}">
														<img src="{{$avatar}}" alt="User Avatar" class="img-circle" />
													</span>
													<div class="chat-body clearfix">
														<div class="header">
															@if ($class == 'right')
																<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>{{$chat->created_at}}</small>
																<strong class="pull-right primary-font">{{$chat->user->name}}</strong>
															@else
																<strong class="primary-font">{{$chat->user->name}}</strong> <small class="pull-right text-muted">
																	<span class="glyphicon glyphicon-time"></span>{{$chat->created_at}}</small>
															@endif
															
														</div>
														<p>
															{{$chat->message}}
														</p>
													</div>
												</li>	
											@endforeach
										</ul>
									</div>
									<div class="panel-footer">
										<div class="input-group">
											@auth
											<form action="{{route('chat.add')}}" method="POST">
												@csrf
												<input name="message" id="btn-input" type="text" class="form-control input-sm" placeholder="Напишите что то умное..." />
												<span class="input-group-btn">
													<button class="btn btn-warning btn-sm" id="btn-chat">
														{{lang('chat.Написать')}}</button>
												</span>
											</form>
											@else
												<form method="POST" action="{{route('login')}}">
													@csrf
													<div class="form-group">
														<label class="sr-only" for="emailAddress">Email</label>
														<input name="email" type="email" class="form-control" id="emailAddress" placeholder="Email" required>
													</div>
													<div class="form-group">
														<label class="sr-only" for="pwd">Пароль</label>
														<input name="password" type="password" class="form-control" id="pwd" placeholder="Пароль" required>
													</div>
													<button type="submit" class="btn btn-default">Войти</button>
												</form>
						
											@endauth
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
					




				@auth
						<div class="row">
							<div class="col-sm-12">
					
								<div class="card hovercard">
									<div class="cardheader">
					
									</div>
									<div class="avatar">
										<img alt="" src="http://lorempixel.com/100/100/people/9/">
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
					
						</div>
				@endauth
			</div><!--/Right Column -->

		</div><!--/container-fluid-->
	</div>	
	<footer>
		<div class="footer-blurb">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon-text-size"></span> DCMSX</h3>
						<p>DCMSX - это продолжение популярной CMS системы DCMS, разработанной DESURE</p>
					</div>
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon-wrench"></span> Преимущества</h3>
						<p>DCMSX - использует современный фрейморк Laravel новой версии 5.6, совместно с PHP7.2 движок показывает отменную производительность. (с версиями PHP 7.0, 7.1 производильноть заметно хуже)</p>
					</div>
					<div class="col-sm-4 footer-blurb-item">
						<h3><span class="glyphicon glyphicon-paperclip"></span> Complete</h3>
						<p>Professionally cultivate one-to-one customer service with robust ideas. Completely synergize resource taxing relationships via premier niche markets. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
					</div>
				</div>
				<!-- /.row -->	
			</div>
        </div>
        
        <div class="small-print">
        	<div class="container">
        		<p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
        		<p>&copy; DCMSX by Sanek_OS9 2018 </p>
        	</div>
        </div>
	</footer>

	
    <script src="{{elixir('dcmsx/js/core.js')}}"></script>
</body>

</html>
