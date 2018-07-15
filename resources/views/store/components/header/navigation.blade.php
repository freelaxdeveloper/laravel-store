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
                <a href="index.html#">Категории</a>
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
              <li>
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
              </li>
              <li>
                <a href="contact.html">Контакты</a>
              </li>
            </ul>
          </nav>
          <div id="quick-access">
            <div class="dropdown-cart-menu-container pull-right">
              <div class="btn-group dropdown-cart">
                <button class="btn btn-custom dropdown-toggle" data-toggle="dropdown" type="button"><span class="cart-menu-icon"></span> 0 товар(ов) <span class="drop-price">- &#8372;0.00</span></button>
                <div class="dropdown-menu dropdown-cart-menu pull-right clearfix" role="menu">
                  <p class="dropdown-cart-description">Недавно добавленный товар(ы).</p>
                  <ul class="dropdown-cart-product-list">
                    <li class="item clearfix">
                      <a class="delete-item" href="index.html#" title="Delete item"><i class="fa fa-times"></i></a> <a class="edit-item" href="index.html#" title="Edit item"><i class="fa fa-pencil"></i></a>
                      <figure>
                        <a href="product.html"><img alt="phone 4" src="/images/products/thumbnails/item12.jpg"></a>
                      </figure>
                      <div class="dropdown-cart-details">
                        <p class="item-name"><a href="product.html">Cam Optia AF Webcam</a></p>
                        <p>1x <span class="item-price">$499</span></p>
                      </div>
                    </li>
                    <li class="item clearfix">
                      <a class="delete-item" href="index.html#" title="Delete item"><i class="fa fa-times"></i></a> <a class="edit-item" href="index.html#" title="Edit item"><i class="fa fa-pencil"></i></a>
                      <figure>
                        <a href="product.html"><img alt="phone 2" src="/images/products/thumbnails/item13.jpg"></a>
                      </figure>
                      <div class="dropdown-cart-details">
                        <p class="item-name"><a href="product.html">Iphone Case Cover Original</a></p>
                        <p>1x <span class="item-price">$499<span class="sub-price">.99</span></span></p>
                      </div>
                    </li>
                  </ul>
                  <ul class="dropdown-cart-total">
                    <li><span class="dropdown-cart-total-title">Доставка:</span>&#8372;7</li>
                    <li><span class="dropdown-cart-total-title">Всего:</span>&#8372;1005<span class="sub-price">.99</span></li>
                  </ul>
                  <div class="dropdown-cart-action">
                    <p><a class="btn btn-custom-2 btn-block" href="cart.html">Корзина</a></p>
                    <p><a class="btn btn-custom btn-block" href="checkout.html">Оформить</a></p>
                  </div>
                </div>
              </div>
            </div>
            <form action="index.html#" class="form-inline quick-search-form" role="form">
              <div class="form-group">
                <input class="form-control" placeholder="Найти" type="text">
              </div><button class="btn btn-custom" id="quick-search" type="submit"></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
