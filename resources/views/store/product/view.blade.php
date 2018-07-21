@extends('layouts.app')

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
                </div><span class="ratings-amount separator">{{ $product->views }} {{ trans_choice('plural.views', $product->views) }}</span> <span class="separator">|</span> <a class="rate-this" href="product.html#review">Оставить отзыв</a>
              </div>
              <ul class="product-list">
                <li><span>Доступность:</span>В наличии</li>
                <li><span>Код товара:</span>{{ $product->id }}</li>
              </ul>
              <hr>
              <div class="product-color-filter-container">
                <span>Select Color:</span>
                <div class="xs-margin"></div>
                <ul class="filter-color-list clearfix">
                  <li>
                    <a class="filter-color-box" data-bgcolor="#fff" href="product.html#"></a>
                  </li>
                  <li>
                    <a class="filter-color-box" data-bgcolor="#d1d2d4" href="product.html#"></a>
                  </li>
                  <li>
                    <a class="filter-color-box" data-bgcolor="#666467" href="product.html#"></a>
                  </li>
                  <li>
                    <a class="filter-color-box" data-bgcolor="#515151" href="product.html#"></a>
                  </li>
                  <li>
                    <a class="filter-color-box" data-bgcolor="#bcdae6" href="product.html#"></a>
                  </li>
                  <li>
                    <a class="filter-color-box" data-bgcolor="#5272b3" href="product.html#"></a>
                  </li>
                  <li>
                    <a class="filter-color-box" data-bgcolor="#acbf0b" href="product.html#"></a>
                  </li>
                </ul>
              </div>
              <div class="product-size-filter-container">
                <span>Select Size:</span>
                <div class="xs-margin"></div>
                <ul class="filter-size-list clearfix">
                  <li>
                    <a href="product.html#">XS</a>
                  </li>
                  <li>
                    <a href="product.html#">S</a>
                  </li>
                  <li>
                    <a href="product.html#">M</a>
                  </li>
                  <li>
                    <a href="product.html#">L</a>
                  </li>
                  <li>
                    <a href="product.html#">XL</a>
                  </li>
                </ul>
              </div>
              <hr>
              <div class="product-add clearfix">
                <div class="custom-quantity-input">
                  <input name="quantity" type="text" value="1"> <a class="quantity-btn quantity-input-up" href="product.html#" onclick="return!1"><i class="fa fa-angle-up"></i></a> <a class="quantity-btn quantity-input-down" href="product.html#" onclick="return!1"><i class="fa fa-angle-down"></i></a>
                </div><button class="btn btn-custom-2">Добавить в корзину</button>
              </div>
              <div class="md-margin"></div>
              <div class="product-extra clearfix">
                <div class="product-extra-box-container clearfix">
                  <div class="item-action-inner">
                    <a class="icon-button icon-like" href="product.html#">Favourite</a> <a class="icon-button icon-compare" href="product.html#">Checkout</a>
                  </div>
                </div>
                <div class="md-margin visible-xs"></div>
                {{-- <div class="share-button-group">
                  <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                    <a class="addthis_button_facebook"></a> <a class="addthis_button_twitter"></a> <a class="addthis_button_email"></a> <a class="addthis_button_print"></a> <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
                  </div>
                  <script type="text/javascript">
                  var addthis_config={data_track_addressbar:!0};
                  </script>
                  <script src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52b2197865ea0183" type="text/javascript">
                  </script>
                </div> --}}
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
                  {{-- <li>
                    <a data-toggle="tab" href="product.html#video">Видео</a>
                  </li> --}}
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
                  {{-- <div class="tab-pane" id="video">
                    <div class="video-container">
                      <strong>A Video about Product</strong>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur adipisci esse.</p>
                      <hr>
                      <iframe height="315" src="http://www.youtube.com/embed/Z0MNVFtyO30?rel=0" width="560"></iframe>
                    </div>
                  </div> --}}
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
          <div class="purchased-items-container carousel-wrapper">
            <header class="content-title">
              <div class="title-bg">
                <h2 class="title">Аналогичные продукты</h2>
              </div>
              <p class="title-desc">Обратите внимание на аналогичные продукты - после покупки на сумму более &#8372;500 вы можете получить скидку.</p>
            </header>
            <div class="carousel-controls">
              <div class="carousel-btn carousel-btn-prev" id="purchased-items-slider-prev"></div>
              <div class="carousel-btn carousel-btn-next carousel-space" id="purchased-items-slider-next"></div>
            </div>
            <div class="purchased-items-slider owl-carousel">
              <div class="item item-hover">
                <div class="item-image-wrapper">
                  <figure class="item-image-container">
                    <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item7.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item7-hover.jpg"></a>
                  </figure>
                  <div class="item-price-container">
                    <span class="item-price">$160<span class="sub-price">.99</span></span>
                  </div><span class="new-rect">New</span>
                </div>
                <div class="item-meta-container">
                  <div class="ratings-container">
                    <div class="ratings">
                      <div class="ratings-result" data-result="80"></div>
                    </div><span class="ratings-amount">5 Reviews</span>
                  </div>
                  <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                  <div class="item-action">
                    <a class="item-add-btn" href="product.html#"><span class="icon-cart-text">Add to Cart</span></a>
                    <div class="item-action-inner">
                      <a class="icon-button icon-like" href="product.html#">Favourite</a> <a class="icon-button icon-compare" href="product.html#">Checkout</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item item-hover">
                <div class="item-image-wrapper">
                  <figure class="item-image-container">
                    <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item8.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item8-hover.jpg"></a>
                  </figure>
                  <div class="item-price-container">
                    <span class="item-price">$100</span>
                  </div><span class="new-rect">New</span>
                </div>
                <div class="item-meta-container">
                  <div class="ratings-container">
                    <div class="ratings">
                      <div class="ratings-result" data-result="99"></div>
                    </div><span class="ratings-amount">4 Reviews</span>
                  </div>
                  <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                  <div class="item-action">
                    <a class="item-add-btn" href="product.html#"><span class="icon-cart-text">Add to Cart</span></a>
                    <div class="item-action-inner">
                      <a class="icon-button icon-like" href="product.html#">Favourite</a> <a class="icon-button icon-compare" href="product.html#">Checkout</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item item-hover">
                <div class="item-image-wrapper">
                  <figure class="item-image-container">
                    <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item9.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item9-hover.jpg"></a>
                  </figure>
                  <div class="item-price-container">
                    <span class="old-price">$100</span> <span class="item-price">$80</span>
                  </div><span class="discount-rect">-20%</span>
                </div>
                <div class="item-meta-container">
                  <div class="ratings-container">
                    <div class="ratings">
                      <div class="ratings-result" data-result="75"></div>
                    </div><span class="ratings-amount">2 Reviews</span>
                  </div>
                  <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                  <div class="item-action">
                    <a class="item-add-btn" href="product.html#"><span class="icon-cart-text">Add to Cart</span></a>
                    <div class="item-action-inner">
                      <a class="icon-button icon-like" href="product.html#">Favourite</a> <a class="icon-button icon-compare" href="product.html#">Checkout</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item item-hover">
                <div class="item-image-wrapper">
                  <figure class="item-image-container">
                    <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item6.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item6-hover.jpg"></a>
                  </figure>
                  <div class="item-price-container">
                    <span class="item-price">$99</span>
                  </div><span class="new-rect">New</span>
                </div>
                <div class="item-meta-container">
                  <div class="ratings-container">
                    <div class="ratings">
                      <div class="ratings-result" data-result="40"></div>
                    </div><span class="ratings-amount">3 Reviews</span>
                  </div>
                  <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                  <div class="item-action">
                    <a class="item-add-btn" href="product.html#"><span class="icon-cart-text">Add to Cart</span></a>
                    <div class="item-action-inner">
                      <a class="icon-button icon-like" href="product.html#">Favourite</a> <a class="icon-button icon-compare" href="product.html#">Checkout</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item item-hover">
                <div class="item-image-wrapper">
                  <figure class="item-image-container">
                    <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item7.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item7-hover.jpg"></a>
                  </figure>
                  <div class="item-price-container">
                    <span class="item-price">$280</span>
                  </div>
                </div>
                <div class="item-meta-container">
                  <div class="ratings-container"></div>
                  <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                  <div class="item-action">
                    <a class="item-add-btn" href="product.html#"><span class="icon-cart-text">Add to Cart</span></a>
                    <div class="item-action-inner">
                      <a class="icon-button icon-like" href="product.html#">Favourite</a> <a class="icon-button icon-compare" href="product.html#">Checkout</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item item-hover">
                <div class="item-image-wrapper">
                  <figure class="item-image-container">
                    <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item10.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item10-hover.jpg"></a>
                  </figure>
                  <div class="item-price-container">
                    <span class="old-price">$150</span> <span class="item-price">$120</span>
                  </div>
                </div>
                <div class="item-meta-container">
                  <div class="ratings-container"></div>
                  <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                  <div class="item-action">
                    <a class="item-add-btn" href="product.html#"><span class="icon-cart-text">Add to Cart</span></a>
                    <div class="item-action-inner">
                      <a class="icon-button icon-like" href="product.html#">Favourite</a> <a class="icon-button icon-compare" href="product.html#">Checkout</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection