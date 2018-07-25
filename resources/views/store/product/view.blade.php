@extends('layouts.app')

@section('title', $product->title . ' - заказать онлайн')

@section('content')
  <section id="content">
    <div id="breadcrumb-container">
      <div class="container">
        <ul class="breadcrumb">
          <li>
            <a href="{{ route('home') }}">Домой</a>
          </li>
          <li class="active">{{ $product->title }}</li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 product-viewer clearfix">
              <div id="product-image-carousel-container">
                <ul class="celastislide-list" id="product-carousel">
                  @foreach($product->screens->sortByDesc('filename') as $screen)
                    <li @if ($loop->first) class="active-slide" @endif>
                      <a class="product-gallery-item" data-image="{{ $screen['image']->size(800, 1120)->get('src') }}" data-rel="prettyPhoto[product]" data-zoom-image="{{ $screen['image']->size(800, 1120)->get('src') }}" href="{{ $screen['image']->size(800, 1120)->get('src') }}">
                        <img alt="Phone photo {{ $screen['id'] }}" src="{{ $screen['image']->size(122, 170)->get('src') }}">
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div id="product-image-container">
                <figure>
                  <img alt="Product Big image" data-zoom-image="{{ $product->screen['src'] }}" id="product-image" src="{{ $product->screen['src'] }}">
                  <figcaption class="item-price-container">
                    @if($product->price_old)
                      <span class="old-price">&#8372;{{ $product->price_old }}</span>
                    @endif
                    <span class="item-price">&#8372;{{ price($product->price) }}</span>
                  </figcaption>
                </figure>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 product">
              <div class="lg-margin visible-sm visible-xs"></div>
              <h1 class="product-name">{{ $product->title }}</h1>
              <div class="ratings-container">
                <div class="ratings separator">
                  <div class="ratings-result" data-result="70"></div>
                </div><span class="ratings-amount separator">{{ $product->views }} {{ trans_choice('plural.views', $product->views) }}</span> <span class="separator">|</span> <a id="myBasket" data-toggle="modal" href="{{ route('prod.comment', [$product]) }}" data-target="#basket" class="rate-this">Оставить отзыв</a>
              </div>
              <ul class="product-list">
                <li><span>Доступность:</span>В наличии</li>
                <li><span>Код товара:</span>{{ $product->id }}</li>
              </ul>
              <hr>
              <div class="product-add clearfix">
                <button class="btn btn-custom-2 buy" data-product-id="{{ $product->id }}" onclick="return false;">Добавить в корзину</button>
              </div>
              <div class="md-margin"></div>
              <div class="product-extra clearfix">
                <div class="md-margin visible-xs"></div>
              </div>
            </div>
          </div>
          <div class="lg-margin2x"></div>
          <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="tab-container left product-detail-tab clearfix">
                <ul class="nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="product.html#overview">Обзор</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="product.html#description">Описание</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="product.html#additional">Доп. информация</a>
                  </li>
                </ul>
                <div class="tab-content clearfix">
                  <div class="tab-pane active" id="overview">
                    <p>Sed volutpat ac massa eget lacinia. Suspendisse non purus semper, tellus vel, tristique urna.</p>
                    <p>Cumque nihil facere itaque mollitia consectetur saepe cupiditate debitis fugiat temporibus soluta maxime doloremque alias enim officia aperiam at similique quae vel sapiente nulla molestiae tenetur deleniti architecto ratione accusantium.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in impedit modi aliquid explicabo aperiam illum esse quibusdam aspernatur commodi voluptate veritatis vero quidem porro vitae non nihil architecto optio!</p>
                    <p>Phasellus consequat id purus in convallis. Nulla quis nunc auctor, pretium enimnec, tristique magna.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam minima officiis consequatur expedita nesciunt voluptates at enim. Reprehenderit possimus vitae dolor tempore earum nulla maxime delectus repellendus excepturi suscipit qui?</p>
                  </div>
                  <div class="tab-pane" id="description">
                    <p>The perfect mix of portability and performance in a slim 1" form factor:</p>
                    <ul class="product-details-list">
                      <li>3rd gen Intel® Core™ i7 quad core processor available;</li>
                      <li>Windows 8 Pro available;</li>
                      <li>13.3" and 15.5" screen sizes available;</li>
                      <li>Double your battery life with available sheet battery;</li>
                      <li>4th gen Intel® Core™ i7 processor available;</li>
                      <li>Full HD TRILUMINOS IPS touchscreen (1920 x 1080);</li>
                      <li>Super fast 512GB PCIe SSD available;</li>
                      <li>Ultra-light at just 2.34 lbs.</li>
                      <li>And more...</li>
                    </ul>
                  </div>
                  <div class="tab-pane" id="additional">
                    <strong>Additional Informations</strong>
                    <p>Quae eum placeat reiciendis enim at dolorem eligendi?</p>
                    <hr>
                    <ul class="product-details-list">
                      <li>Lorem ipsum dolor sit quam</li>
                      <li>Consectetur adipisicing elit</li>
                      <li>Illum autem tempora officia</li>
                      <li>Amet id odio architecto explicabo</li>
                      <li>Voluptatem laborum veritatis</li>
                      <li>Quae laudantium iste libero</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="lg-margin visible-xs"></div>
            </div>
            <div class="lg-margin2x visible-sm visible-xs"></div>
            <div class="col-md-3 col-sm-12 col-xs-12 sidebar">
              <div class="widget related">
                <h3>Related</h3>
                <div class="related-slider flexslider sidebarslider">
                  <ul class="related-list clearfix">
                    <li>
                      <div class="related-product clearfix">
                        <figure>
                          <img alt="item1" src="/images/products/thumbnails/item1.jpg">
                        </figure>
                        <h5><a href="product.html#">Jacket Suiting Blazer</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="related-price">
                          $40
                        </div>
                      </div>
                      <div class="related-product clearfix">
                        <figure>
                          <img alt="item2" src="/images/products/thumbnails/item2.jpg">
                        </figure>
                        <h5><a href="product.html#">Gap Graphic Cuffed</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="related-price">
                          18$
                        </div>
                      </div>
                      <div class="related-product clearfix">
                        <figure>
                          <img alt="item3" src="/images/products/thumbnails/item3.jpg">
                        </figure>
                        <h5><a href="product.html#">Women's Lauren Dress</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="related-price">
                          $30
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="related-product clearfix">
                        <figure>
                          <img alt="item4" src="/images/products/thumbnails/item4.jpg">
                        </figure>
                        <h5><a href="product.html#">Swiss Mobile Phone</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="64"></div>
                          </div>
                        </div>
                        <div class="related-price">
                          $39
                        </div>
                      </div>
                      <div class="related-product clearfix">
                        <figure>
                          <img alt="item5" src="/images/products/thumbnails/item5.jpg">
                        </figure>
                        <h5><a href="product.html#">Zwinzed HeadPhones</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="94"></div>
                          </div>
                        </div>
                        <div class="related-price">
                          $18.99
                        </div>
                      </div>
                      <div class="related-product clearfix">
                        <figure>
                          <img alt="item6" src="/images/products/thumbnails/item6.jpg">
                        </figure>
                        <h5><a href="product.html#">Kless Man Suit</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="74"></div>
                          </div>
                        </div>
                        <div class="related-price">
                          $99
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="related-product clearfix">
                        <figure>
                          <img alt="item2" src="/images/products/thumbnails/item2.jpg">
                        </figure>
                        <h5><a href="product.html#">Gap Graphic Cuffed</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="related-price">
                          $17
                        </div>
                      </div>
                      <div class="related-product clearfix">
                        <figure>
                          <img alt="item4" src="/images/products/thumbnails/item4.jpg">
                        </figure>
                        <h5><a href="product.html#">Women's Lauren Dress</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="related-price">
                          $30
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="lg-margin2x"></div>
        </div>
      </div>
    </div>
  </section>
@endsection