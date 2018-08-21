<!DOCTYPE html>
<!--[if IE 8]><html class="ie8"><![endif]--><!--[if IE 9]><html class="ie9"><![endif]--><!--[if !IE]><!-->
<html>
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta content="Responsive modern ecommerce Html5 Template" name="description"><!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic%7CPT+Gudea:400,700,400italic%7CPT+Oswald:400,700,300" id="googlefont" rel="stylesheet">
	<link href="{{elixir('/css/store.css')}}" rel="stylesheet">
	{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
	{{-- <script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script> --}}
	
	<!--[if lt IE 9]><script src="js/html5shiv.js"></script>
						<script src="js/respond.min.js"></script><![endif]-->
						
	@yield('head')
</head>
<body>
	<!-- Modal -->
	<div class="modal fade" id="basket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
	
		</div>
		</div>
	</div>
	
	
	{{-- @include('components.header.option-panel') --}}
	<div id="wrapper">
		<header id="header">
			@include('components.header.top')
			@include('components.header.inner')
		</header>

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

		@yield('content')
		<footer id="footer">
			{{-- <div id="inner-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-12 widget">
							<h3>Мой аккаунт</h3>
							<ul class="links">
								<li>
									<a href="#">Мой аккаунт</a>
								</li>
								<li>
									<a href="#">Персональная инфориация</a>
								</li>
								<li>
									<a href="#">Наши адреса</a>
								</li>
								<li>
									<a href="#">Скидки</a>
								</li>
								<li>
									<a href="#">История покупок</a>
								</li>
								<li>
									<a href="#">Ваши ваучеры</a>
								</li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-12 widget">
							<h3>Информация</h3>
							<ul class="links">
								<li>
									<a href="#">Новые продукты</a>
								</li>
								<li>
									<a href="#">Лучшие продавцы</a>
								</li>
								<li>
									<a href="#">Специальные предложения</a>
								</li>
								<li>
									<a href="#">Производители</a>
								</li>
								<li>
									<a href="#">Поставщики</a>
								</li>
								<li>
									<a href="#">Наши магазины</a>
								</li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-12 widget">
							<h3>О нас</h3>
							<ul class="contact-list">
								<li><strong>Твоя Мебель</strong></li>
								<li>Украина</li>
								<li>Киевская обл.</li>
								<li>Киев</li>
								<li>Рабочие дни: Пн. - Сб.</li>
								<li>Рабочие часы: 9.00AM - 8.00PM</li>
							</ul>
						</div>
						<div class="clearfix visible-sm"></div>
						<div class="col-md-3 col-sm-12 col-xs-12 widget">
							<h3>FACEBOOK LIKE BOX</h3>
							<div class="facebook-likebox">
								<iframe src="https://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
			<div id="footer-bottom">
				<div class="container">
					<div class="row">
						{{-- <div class="col-md-7 col-sm-7 col-xs-12 footer-social-links-container">
							<ul class="social-links clearfix">
								<li>
									<a class="social-icon icon-facebook" href="#"></a>
								</li>
								<li>
									<a class="social-icon icon-twitter" href="#"></a>
								</li>
								<li>
									<a class="social-icon icon-rss" href="#"></a>
								</li>
								<li>
									<a class="social-icon icon-delicious" href="#"></a>
								</li>
								<li>
									<a class="social-icon icon-linkedin" href="#"></a>
								</li>
								<li>
									<a class="social-icon icon-flickr" href="#"></a>
								</li>
								<li>
									<a class="social-icon icon-skype" href="#"></a>
								</li>
								<li>
									<a class="social-icon icon-email" href="#"></a>
								</li>
							</ul>
						</div> --}}
						<div class="col-md-5 col-sm-5 col-xs-12 footer-text-container text-right">
							<p>&copy; 2018 Табуретка&trade;</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div><a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a> 
	<script src="{{elixir('js/main.js')}}"></script>
	<script src="{{elixir('js/vue.js')}}"></script>

	@yield('js')

	<script>
		$(function() {
			jQuery("#slider-rev").revolution({
				delay: 8e3,
				startwidth: 1170,
				startheight: 600,
				onHoverStop: "true",
				hideThumbs: 250,
				navigationHAlign: "center",
				navigationVAlign: "bottom",
				navigationHOffset: 0,
				navigationVOffset: 20,
				soloArrowLeftHalign: "left",
				soloArrowLeftValign: "center",
				soloArrowLeftHOffset: 0,
				soloArrowLeftVOffset: 0,
				soloArrowRightHalign: "right",
				soloArrowRightValign: "center",
				soloArrowRightHOffset: 0,
				soloArrowRightVOffset: 0,
				touchenabled: "on",
				stopAtSlide: -1,
				stopAfterLoops: -1,
				dottedOverlay: "none",
				fullWidth: "on",
				spinned: "spinner5",
				shadow: 0,
				hideTimerBar: "on"
			})
		});
	</script>
</body>
</html>