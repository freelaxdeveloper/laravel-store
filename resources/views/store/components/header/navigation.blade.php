<div id="main-nav-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12 clearfix">
          <nav id="main-nav">
            <div id="responsive-nav">
              <div id="responsive-nav-button">
                Menu <span id="responsive-nav-button-icon"></span>
              </div>
            </div>
            <ul class="menu clearfix">
              <li>
                <a class="active" href="{{ route('home') }}">Главная</a>
              </li>
              <li class="mega-menu-container">
                <a href="#">Категории</a>
                <div class="mega-menu clearfix">
                  @foreach($categories as $category)
                    <div class="col-5">
                      <a class="mega-menu-title" href="{{ route('cat.view', [$category]) }}">{{ $category->name }}</a>
                      <ul class="mega-menu-list clearfix">
                        @foreach($category->children as $child)
                          <li>
                            <a href="{{ route('cat.view', [$child]) }}">{{ $child->name }}</a>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  @endforeach
                 </div>
              </li>
              {{-- <li>
                <a href="index.html#">Portfolio</a>
                <ul>
                  <li>
                    <a href="index.html#">Classic</a>
                    <ul>
                      <li>
                        <a href="portfolio-2.html">Two Columns</a>
                      </li>
                      <li>
                        <a href="portfolio-3.html">Three Columns</a>
                      </li>
                      <li>
                        <a href="portfolio-4.html">Four Columns</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="index.html#">Masonry</a>
                    <ul>
                      <li>
                        <a href="portfolio-masonry-2.html">Two Columns</a>
                      </li>
                      <li>
                        <a href="portfolio-masonry-3.html">Three Columns</a>
                      </li>
                      <li>
                        <a href="portfolio-masonry-4.html">Four Columns</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="index.html#">Portfolio Posts</a>
                    <ul>
                      <li>
                        <a href="single-portfolio.html">Image Post</a>
                      </li>
                      <li>
                        <a href="single-portfolio-gallery.html">Gallery Post</a>
                      </li>
                      <li>
                        <a href="single-portfolio-video.html">Video Post</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li> --}}
              {{-- <li>
                <a href="contact.html">Контакты</a>
              </li> --}}
            </ul>
          </nav>
          <div id="quick-access">
            <div class="dropdown-cart-menu-container pull-right">
              <div class="btn-group dropdown-cart">
                <button class="btn btn-custom dropdown-toggle" data-toggle="dropdown" type="button"><span class="cart-menu-icon"></span> <span class="basket-counter">{{ order()->count() }}</span> товар(ов) <span class="drop-price">- &#8372;<span class="basket-sum">{{ number_format(order()->products()->sum('price')) }}</span></span></button>
                <div class="dropdown-menu dropdown-cart-menu pull-right clearfix" role="menu">
                  <p class="dropdown-cart-description">Недавно добавленный товар(ы).</p>
                  <ul class="dropdown-cart-product-list">

                    @foreach(order()->products() as $product)
                      <li class="item clearfix itemBasket{{ $product->id }}">
                        <a onclick="return false;" class="delete-item" data-product-id="{{ $product->id }}" href="#" title="Удалить"><i class="fa fa-times"></i></a> {{-- <a class="edit-item" href="#" title="Редактировать" data-product-id="{{ $product->id }}"><i class="fa fa-pencil"></i></a> --}}
                        <figure>
                          <a href="{{ route('prod.view', [$product]) }}"><img alt="phone 4" src="{{ $product->screen['image']->size(122, 170)->get('src') }}"></a>
                        </figure>
                        <div class="dropdown-cart-details">
                          <p class="item-name"><a href="{{ route('prod.view', [$product]) }}">{{ $product->title }}</a></p>
                          <p>{{ $product->count }}x <span class="item-price">&#8372;{{ number_format(price($product->price)) }}</span></p>
                        </div>
                      </li>
                    @endforeach

                  </ul>
                  <ul class="dropdown-cart-total">
                    {{-- <li><span class="dropdown-cart-total-title">Доставка:</span>&#8372;7</li> --}}
                    <li style="height:28px;">&nbsp;</li>
                    <li><span class="dropdown-cart-total-title">Всего:</span>&#8372;<span class="basket-sum">{{ number_format(order()->products()->sum('price')) }}</span></li>
                  </ul>
                  <div class="dropdown-cart-action">
                    <p>
                      <a class="btn btn-custom-2 btn-block" id="myBasket" data-toggle="modal" href="{{ route('basket', ['view']) }}" data-target="#basket">Корзина</a>
                    </p>
                    <p><a class="btn btn-custom btn-block" href="{{ route('basket.oformit-zakaz') }}">Оформить</a></p>
                  </div>
                </div>
              </div>
            </div>
            <form action="?" class="form-inline quick-search-form" role="form">
              <div class="form-group">
                <input name="search" class="form-control" placeholder="Найти" type="text">
              </div><button class="btn btn-custom" id="quick-search" type="submit"></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
