@extends('layouts.app')

@section('title', 'DCMSX - CMS система управления сайтом')

@section('meta')
<link rel="canonical" href="{{url('/')}}/"/>
@endsection

@section('content')
    <!-- Team -->
    <section id="team">

        <div class="col-md-12">
			@include('listing.products', ['products' => $products])
        </div>
    </section>
    <!-- Team -->
@endsection

@section('info')
<!-- Services section -->
<section id="what-we-do">
	<div class="container-fluid">
		<h2 class="section-title mb-2 h1">DCMS X</h2>
		<p class="text-center text-muted h5">CMS система для быстрого создания создания функционального сайта</p>
		<div class="row mt-5">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-1">
						<h3 class="card-title">DCMSX</h3>
						<p class="card-text">DCMSX - это продолжение популярной CMS системы DCMS, разработанной DESURE</p>
						<a href="javascript:void();" title="Подробнее" class="read-more">Подробнее<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-2">
						<h3 class="card-title">Набор готовых решений</h3>
						<p class="card-text">Система имеет все необхоимые модули для создания полноценного сайта на любую тематику</p>
						<a href="javascript:void();" title="Подробнее" class="read-more">Подробнее<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-3">
						<h3 class="card-title">Шаблоны</h3>
						<p class="card-text">Гибкое управление шаблоном позволяет легко создать или переделать существующий шаблон для сайта</p>
						<a href="javascript:void();" title="Подробнее" class="read-more">Подробнее<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-4">
						<h3 class="card-title">Преимущества</h3>
						<p class="card-text">DCMSX - использует современный фрейморк Laravel новой версии 5.6, совместно с PHP7.2 движок показывает отменную производительность</p>
						<a href="javascript:void();" title="Подробнее" class="read-more">Подробнее<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-5">
						<h3 class="card-title">Поддержка</h3>
						<p class="card-text">Сообщество фрейморка Laravel достаточно большое что бы вы легко и быстро могли получить ответы на возникшие опросы, так же вы всегда можете обратится за помощю на наш форум</p>
						<a href="javascript:void();" title="Подробнее" class="read-more">Подробнее<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-6">
						<h3 class="card-title">Заказ модулей</h3>
						<p class="card-text">Недостающие модули для нашей CMS вы легко сможете заказать на нашем форуме</p>
						<a href="javascript:void();" title="Подробнее" class="read-more">Подробнее<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<!-- /Services-->
@endsection

