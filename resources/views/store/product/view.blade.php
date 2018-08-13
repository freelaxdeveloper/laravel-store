@extends('layouts.app')

@section('title', $product->title . ' - заказать онлайн')

@section('content')
  <section id="content">
    <div id="breadcrumb-container">
      <div class="container">
        <ul class="breadcrumb">
          <li>
            <a href="{{ route('home') }}">Главная</a>
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
                  <div class="ratings-result" data-result="{{ $product->ratingAvg / 5 * 100 }}"></div>
                </div>
                <span class="ratings-amount separator">{{ $product->views }} {{ trans_choice('plural.views', $product->views) }}</span> <span class="separator">|</span> <a id="myBasket" data-toggle="modal" href="{{ route('prod.comment', [$product]) }}" data-target="#basket" class="rate-this">Оставить отзыв</a>
                @auth('admin')
                  <span class="separator">|</span> <a id="myBasket" data-toggle="modal" href="{{ route('prod.actions', [$product]) }}" data-target="#basket" class="rate-this">Управление</a>
                @endauth
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
              @if ($product->description)
                <div class="tab-container left product-detail-tab clearfix">
                  <ul class="nav-tabs">
                    <li class="active">
                      <a data-toggle="tab" href="product.html#overview">Описание</a>
                    </li>
                  </ul>
                  <div class="tab-content clearfix">
                    <div class="tab-pane active" id="overview">
                      {!! $product->description !!}
                    </div>
                  </div>
                </div>
              @endif
              <div class="lg-margin visible-xs"></div>

              <div class="comments">
                <header class="title-bg">
                  <h3>Комментарии ({{ $product->comments->count() }})</h3>
                </header>
                <ul class="comments-list">

                  @foreach( $product->comments as $comment)
                    <li>
                      <div class="comment clearfix">
                        <figure>
                          <img alt="Comment Author" src="https://placeimg.com/70/70/people?t={{ microtime() }}">
                        </figure>
                        <div class="comment-details">
                          <div class="comment-title">
                              {{ $comment->ratingStr }}
                              <div class="ratings separator">
                                <div class="ratings-result" data-result="{{ $comment->rating / 5 * 100 }}"></div>
                              </div>
                          </div>
                          <div class="comment-meta-container">
                            <a href="single.html#">{{ $comment->name }}</a> <span>{{ $comment->created_at->format('Y-m-d') }}</span>{{--  <a class="replay-button" href="single.html#">Replay</a> --}}
                          </div>
                          <p>{{ $comment->comment }}</p>
                        </div>
                      </div>
                    </li>

                  @endforeach
                </ul>
                <a class="btn btn-custom-2" id="myBasket" data-toggle="modal" href="{{ route('prod.comment', [$product]) }}" data-target="#basket" class="rate-this">Написать отзыв</a>
              </div>
            


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