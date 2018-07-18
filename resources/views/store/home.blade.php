@extends('layouts.app')

@section('content')

{{-- @include('components.slider') --}}
<section id="content">

  <div class="md-margin2x"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-9 col-sm-8 col-xs-12 main-content">
            <header class="content-title">
              <h2 class="title">Наши продукты</h2>
              <p class="title-desc">Сохраните ваши деньги и время в нашем магазине. Вот лучшая часть нашего впечатляющего ассортимента.</p>
            </header>
            <div class="row tab-content" id="products-tabs-content">
              @include('components.listing.products', ['products' => $products, 'grid' => true])
            </div>
            <div class="xlg-margin"></div>
            {{-- <div class="hot-items carousel-wrapper">
              <header class="content-title">
                <div class="title-bg">
                  <h2 class="title">Так же в продаже</h2>
                </div>
                <p class="title-desc">Только с нами вы можете получить новую модель со скидкой.</p>
              </header>
              <div class="carousel-controls">
                <div class="carousel-btn carousel-btn-prev" id="hot-items-slider-prev"></div>
                <div class="carousel-btn carousel-btn-next carousel-space" id="hot-items-slider-next"></div>
              </div>
              <div class="hot-items-slider owl-carousel">
                @include('components.listing.products', ['products' => $products])
              </div>
              <div class="lg-margin"></div>
            </div> --}}
          </div>
          {{-- <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
            <div class="widget subscribe">
              <h3>Узнай первым</h3>
              <p>Получите всю последнюю информацию о событиях, продажах и предложениях. Подпишитесь на информационный бюллетень магазина ТМебель сегодня.</p>
              <form action="index.html#" id="subscribe-form" name="subscribe-form">
                <div class="form-group">
                  <input class="form-control" id="subscribe-email" placeholder="Введите Ваш E-mail адрес" type="email">
                </div><input class="btn btn-custom" type="submit" value="Подписаться">
              </form>
            </div>
            <div class="widget testimonials">
              <h3>Отзывы</h3>
              <div class="testimonials-slider flexslider sidebarslider">
                <ul class="testimonials-list clearfix">
                  <li>
                    <div class="testimonial-details">
                      <header>
                        Лучший сервис!
                      </header>Это лучший магазин в котором мне когда-либо приходилось покупать.
                    </div>
                    <figure class="clearfix">
                      <img alt="Computer Ceo" src="/images/testimonials/anna.jpg">
                      <figcaption>
                        <a href="index.html#">Anna Retallic</a> <span>12.05.2013</span>
                      </figcaption>
                    </figure>
                  </li>
                  <li>
                    <div class="testimonial-details">
                      <header>
                        Хороший стиль!
                      </header>Стильно, модно, молодежно!
                    </div>
                    <figure class="clearfix">
                      <img alt="Computer Ceo" src="/images/testimonials/jake.jpg">
                      <figcaption>
                        <a href="index.html#">Jake Suasoo</a> <span>17.05.2013</span>
                      </figcaption>
                    </figure>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget latest-posts">
              <h3>Новости</h3>
              <div class="latest-posts-slider flexslider sidebarslider">
                <ul class="latest-posts-list clearfix">
                  <li>
                    <a href="single.html">
                    <figure class="latest-posts-media-container">
                      <img alt="lats post" class="img-responsive" src="/images/blog/post1-small.jpg">
                    </figure></a>
                    <h4><a href="single.html">Скидка 35% на вторую покупку!</a></h4>
                    <p>Sed blandit nulla nec nunc ullamcorper tristique. Mauris adipiscing cursus ante ultricies dictum sed lobortis.</p>
                    <div class="latest-posts-meta-container clearfix">
                      <div class="pull-left">
                        <a href="index.html#">Подробнее...</a>
                      </div>
                      <div class="pull-right">
                        12.05.2013
                      </div>
                    </div>
                  </li>
                  <li>
                    <a href="single.html">
                    <figure class="latest-posts-media-container">
                      <img alt="lats post" class="img-responsive" src="/images/blog/post2-small.jpg">
                    </figure></a>
                    <h4><a href="single.html">Бесплатная доставка для постоянных клиентов</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque fuga officia in molestiae easint..</p>
                    <div class="latest-posts-meta-container clearfix">
                      <div class="pull-left">
                        <a href="index.html#">Подробнее...</a>
                      </div>
                      <div class="pull-right">
                        10.05.2013
                      </div>
                    </div>
                  </li>
                  <li>
                    <a href="single.html">
                    <figure class="latest-posts-media-container">
                      <img alt="lats post" class="img-responsive" src="/images/blog/post3-small.jpg">
                    </figure></a>
                    <h4><a href="index.html#">Новые джинсы по продажам!</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque fuga officia in molestiae easint..</p>
                    <div class="latest-posts-meta-container clearfix">
                      <div class="pull-left">
                        <a href="index.html#">Подробнее...</a>
                      </div>
                      <div class="pull-right">
                        8.05.2013
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            {{-- <div class="widget banner-slider-container">
              <div class="banner-slider flexslider">
                <ul class="banner-slider-list clearfix">
                  <li>
                    <a href="index.html#"><img alt="Banner 1" src="/images/banner1.jpg"></a>
                  </li>
                  <li>
                    <a href="index.html#"><img alt="Banner 2" src="/images/banner2.jpg"></a>
                  </li>
                  <li>
                    <a href="index.html#"><img alt="Banner 3" src="/images/banner3.jpg"></a>
                  </li>
                </ul>
              </div>
            </div> --}}
          {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection