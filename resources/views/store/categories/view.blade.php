@extends('layouts.app')

@section('title', $category->name)

@section('meta')
    <link rel="canonical" href="{{route('cat.view', [$category])}}"/>
@endsection


@section('content')
<section id="content">
    <div id="category-header">
      <div class="row">
        <div class="container">
          <div class="col-2">
            <div class="category-image"><img alt="Phone" class="img-responsive" src="/images/products/category-show.png"></div>
          </div>
          <div class="col-2 last">
            <div class="category-title">
              <h2>Mobile</h2>
              <p>Aenean dictum libero vitae magna sagittis, eu convallis dolor blandit. Fusce consectetur tincidunt pretium. Etiam non tellus massa. Aenean tincidunt in augue nec tempus. Nulla porta libero sit amet lorem pellentesque posuere...</p><a class="btn btn-custom" href="category.html#">LEARN MORE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="category-breadcrumb">
      <div class="container">
        <ul class="breadcrumb">
          <li>
            <a href="index.html">Home</a>
          </li>
          <li>
            <a href="category.html#">Electronics</a>
          </li>
          <li class="active">Mobile</li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12 main-content">
              <div class="category-toolbar clearfix">
                <div class="toolbox-filter clearfix">
                  <div class="sort-box">
                    <span class="separator">sort by:</span>
                    <div class="btn-group select-dropdown">
                      <button class="btn select-btn" type="button">Position</button> <button class="btn dropdown-toggle" data-toggle="dropdown" type="button"><i class="fa fa-angle-down"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="category.html#">Date</a>
                        </li>
                        <li>
                          <a href="category.html#">Name</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="view-box">
                    <a class="active icon-button icon-grid" href="category.html"><i class="fa fa-th-large"></i></a> <a class="icon-button icon-list" href="category-list.html"><i class="fa fa-th-list"></i></a>
                  </div>
                </div>
                <div class="toolbox-pagination clearfix">
                  <ul class="pagination">
                    <li class="active">
                      <a href="category.html#">1</a>
                    </li>
                    <li>
                      <a href="category.html#">2</a>
                    </li>
                    <li>
                      <a href="category.html#">3</a>
                    </li>
                    <li>
                      <a href="category.html#">4</a>
                    </li>
                    <li>
                      <a href="category.html#">5</a>
                    </li>
                    <li>
                      <a href="category.html#"><i class="fa fa-angle-right"></i></a>
                    </li>
                  </ul>
                  <div class="view-count-box">
                    <span class="separator">view:</span>
                    <div class="btn-group select-dropdown">
                      <button class="btn select-btn" type="button">10</button> <button class="btn dropdown-toggle" data-toggle="dropdown" type="button"><i class="fa fa-angle-down"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="category.html#">15</a>
                        </li>
                        <li>
                          <a href="category.html#">30</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="md-margin"></div>
              <div class="category-item-container">
                <div class="row">
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item2.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item2-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="old-price">$210<span class="sub-price">.99</span></span> <span class="item-price">$160<span class="sub-price">.99</span></span>
                        </div><span class="new-rect">New</span> <span class="discount-rect">-15%</span>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="80"></div>
                          </div><span class="ratings-amount">5 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item1.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item1-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="item-price">$199</span>
                        </div><span class="new-rect">New</span>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="74"></div>
                          </div><span class="ratings-amount">9 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item4.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item4-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="old-price">$120<span class="sub-price">.99</span></span> <span class="item-price">$99<span class="sub-price">.99</span></span>
                        </div><span class="discount-rect">-25%</span>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="90"></div>
                          </div><span class="ratings-amount">4 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item10.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item10-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="item-price">$180<span class="sub-price">.99</span></span>
                        </div>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container"></div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item6.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item6-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="old-price">$99<span class="sub-price">.99</span></span> <span class="item-price">$84<span class="sub-price">.99</span></span>
                        </div><span class="discount-rect">-20%</span>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="70"></div>
                          </div><span class="ratings-amount">6 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item9.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item9-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="item-price">$49<span class="sub-price">.99</span></span>
                        </div><span class="new-rect">New</span>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="60"></div>
                          </div><span class="ratings-amount">2 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item2.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item2-hover.jpg"></a>
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
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item3.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item3-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="item-price">$200</span>
                        </div><span class="discount-rect">-10%</span>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="74"></div>
                          </div><span class="ratings-amount">9 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item5.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item5-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="old-price">$120<span class="sub-price">.99</span></span> <span class="item-price">$99<span class="sub-price">.99</span></span>
                        </div><span class="new-rect">New</span>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="96"></div>
                          </div><span class="ratings-amount">5 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item3.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item3-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="item-price">$99<span class="sub-price">.99</span></span>
                        </div>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container"></div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item7.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item7-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="old-price">$99<span class="sub-price">.99</span></span> <span class="item-price">$84<span class="sub-price">.99</span></span>
                        </div><span class="discount-rect">-30%</span>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="70"></div>
                          </div><span class="ratings-amount">6 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item item-hover">
                      <div class="item-image-wrapper">
                        <figure class="item-image-container">
                          <a href="product.html"><img alt="item1" class="item-image" src="/images/products/item5.jpg"> <img alt="item1 Hover" class="item-image-hover" src="/images/products/item5-hover.jpg"></a>
                        </figure>
                        <div class="item-price-container">
                          <span class="item-price">$49<span class="sub-price">.99</span></span>
                        </div>
                      </div>
                      <div class="item-meta-container">
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="60"></div>
                          </div><span class="ratings-amount">2 Reviews</span>
                        </div>
                        <h3 class="item-name"><a href="product.html">Phasellus consequat</a></h3>
                        <div class="item-action">
                          <a class="item-add-btn" href="category.html#"><span class="icon-cart-text">Add to Cart</span></a>
                          <div class="item-action-inner">
                            <a class="icon-button icon-like" href="category.html#">Favourite</a> <a class="icon-button icon-compare" href="category.html#">Checkout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pagination-container clearfix">
                <div class="pull-right">
                  <ul class="pagination">
                    <li class="active">
                      <a href="category.html#">1</a>
                    </li>
                    <li>
                      <a href="category.html#">2</a>
                    </li>
                    <li>
                      <a href="category.html#">3</a>
                    </li>
                    <li>
                      <a href="category.html#">4</a>
                    </li>
                    <li>
                      <a href="category.html#">5</a>
                    </li>
                    <li>
                      <a href="category.html#"><i class="fa fa-angle-right"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="pull-right view-count-box hidden-xs">
                  <span class="separator">view:</span>
                  <div class="btn-group select-dropdown">
                    <button class="btn select-btn" type="button">10</button> <button class="btn dropdown-toggle" data-toggle="dropdown" type="button"><i class="fa fa-angle-down"></i></button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="category.html#">15</a>
                      </li>
                      <li>
                        <a href="category.html#">30</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <aside class="col-md-3 col-sm-4 col-xs-12 sidebar">
              <div class="widget">
                <div class="panel-group custom-accordion sm-accordion" id="category-filter">
                  <div class="panel">
                    <div class="accordion-header">
                      <div class="accordion-title">
                        <span>Category</span>
                      </div><a class="accordion-btn opened" data-target="#category-list-1" data-toggle="collapse"></a>
                    </div>
                    <div class="collapse in" id="category-list-1">
                      <div class="panel-body">
                        <ul class="category-filter-list jscrollpane">
                          <li>
                            <a href="category.html#">Mobile Phones (341)</a>
                          </li>
                          <li>
                            <a href="category.html#">Smartphones (55)</a>
                          </li>
                          <li>
                            <a href="category.html#">Communicators (24)</a>
                          </li>
                          <li>
                            <a href="category.html#">CDMA Phones (14)</a>
                          </li>
                          <li>
                            <a href="category.html#">Accessories (83)</a>
                          </li>
                          <li>
                            <a href="category.html#">Chargers (8)</a>
                          </li>
                          <li>
                            <a href="category.html#">Memory Cards (6)</a>
                          </li>
                          <li>
                            <a href="category.html#">Protectors (12)</a>
                          </li>
                          <li>
                            <a href="category.html#">ravelsim (5)</a>
                          </li>
                          <li>
                            <a href="category.html#">CDMA Phones (14)</a>
                          </li>
                          <li>
                            <a href="category.html#">Accessories (83)</a>
                          </li>
                          <li>
                            <a href="category.html#">Chargers (8)</a>
                          </li>
                          <li>
                            <a href="category.html#">Memory Cards (6)</a>
                          </li>
                          <li>
                            <a href="category.html#">Protectors (12)</a>
                          </li>
                          <li>
                            <a href="category.html#">ravelsim (5)</a>
                          </li>
                          <li>
                            <a href="category.html#">CDMA Phones (14)</a>
                          </li>
                          <li>
                            <a href="category.html#">Accessories (83)</a>
                          </li>
                          <li>
                            <a href="category.html#">Chargers (8)</a>
                          </li>
                          <li>
                            <a href="category.html#">Memory Cards (6)</a>
                          </li>
                          <li>
                            <a href="category.html#">Protectors (12)</a>
                          </li>
                          <li>
                            <a href="category.html#">ravelsim (5)</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="accordion-header">
                      <div class="accordion-title">
                        <span>Brand</span>
                      </div><a class="accordion-btn opened" data-target="#category-list-2" data-toggle="collapse"></a>
                    </div>
                    <div class="collapse in" id="category-list-2">
                      <div class="panel-body">
                        <ul class="category-filter-list jscrollpane">
                          <li>
                            <a href="category.html#">Samsung (50)</a>
                          </li>
                          <li>
                            <a href="category.html#">Apple (80)</a>
                          </li>
                          <li>
                            <a href="category.html#">HTC (20)</a>
                          </li>
                          <li>
                            <a href="category.html#">Motoroloa (20)</a>
                          </li>
                          <li>
                            <a href="category.html#">Nokia (11)</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="accordion-header">
                      <div class="accordion-title">
                        <span>Price</span>
                      </div><a class="accordion-btn opened" data-target="#category-list-3" data-toggle="collapse"></a>
                    </div>
                    <div class="collapse in" id="category-list-3">
                      <div class="panel-body">
                        <div id="price-range"></div>
                        <div id="price-range-details">
                          <span class="sm-separator">from</span> <input class="separator" id="price-range-low" type="text"> <span class="sm-separator">to</span> <input id="price-range-high" type="text">
                        </div>
                        <div id="price-range-btns">
                          <a class="btn btn-custom-2 btn-sm" href="category.html#">Ok</a> <a class="btn btn-custom-2 btn-sm" href="category.html#">Clear</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel">
                    <div class="accordion-header">
                      <div class="accordion-title">
                        <span>Color</span>
                      </div><a class="accordion-btn opened" data-target="#category-list-4" data-toggle="collapse"></a>
                    </div>
                    <div class="collapse in" id="category-list-4">
                      <div class="panel-body">
                        <ul class="filter-color-list clearfix">
                          <li>
                            <a class="filter-color-box" data-bgcolor="#fff" href="category.html#"></a>
                          </li>
                          <li>
                            <a class="filter-color-box" data-bgcolor="#ffff33" href="category.html#"></a>
                          </li>
                          <li>
                            <a class="filter-color-box" data-bgcolor="#ff9900" href="category.html#"></a>
                          </li>
                          <li class="last-md">
                            <a class="filter-color-box" data-bgcolor="#ff9999" href="category.html#"></a>
                          </li>
                          <li class="last-lg">
                            <a class="filter-color-box" data-bgcolor="#99cc33" href="category.html#"></a>
                          </li>
                          <li>
                            <a class="filter-color-box" data-bgcolor="#339933" href="category.html#"></a>
                          </li>
                          <li>
                            <a class="filter-color-box" data-bgcolor="#ff0000" href="category.html#"></a>
                          </li>
                          <li class="last-md">
                            <a class="filter-color-box" data-bgcolor="#ff3366" href="category.html#"></a>
                          </li>
                          <li>
                            <a class="filter-color-box" data-bgcolor="#cc33ff" href="category.html#"></a>
                          </li>
                          <li class="last-lg">
                            <a class="filter-color-box" data-bgcolor="#9966cc" href="category.html#"></a>
                          </li>
                          <li>
                            <a class="filter-color-box" data-bgcolor="#99ccff" href="category.html#"></a>
                          </li>
                          <li class="last-md">
                            <a class="filter-color-box" data-bgcolor="#3333cc" href="category.html#"></a>
                          </li>
                          <li>
                            <a class="filter-color-box" data-bgcolor="#999999" href="category.html#"></a>
                          </li>
                          <li>
                            <a class="filter-color-box" data-bgcolor="#663300" href="category.html#"></a>
                          </li>
                          <li class="last-lg">
                            <a class="filter-color-box" data-bgcolor="#000" href="category.html#"></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="widget featured">
                <h3>Featured</h3>
                <div class="featured-slider flexslider sidebarslider">
                  <ul class="featured-list clearfix">
                    <li>
                      <div class="featured-product clearfix">
                        <figure>
                          <img alt="item5" src="/images/products/thumbnails/item5.jpg">
                        </figure>
                        <h5><a href="category.html#">Jacket Suiting Blazer</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="featured-price">
                          $40
                        </div>
                      </div>
                      <div class="featured-product clearfix">
                        <figure>
                          <img alt="item1" src="/images/products/thumbnails/item1.jpg">
                        </figure>
                        <h5><a href="category.html#">Gap Graphic Cuffed</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="featured-price">
                          $18
                        </div>
                      </div>
                      <div class="featured-product clearfix">
                        <figure>
                          <img alt="item2" src="/images/products/thumbnails/item2.jpg">
                        </figure>
                        <h5><a href="category.html#">Women's Lauren Dress</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="featured-price">
                          $30
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="featured-product clearfix">
                        <figure>
                          <img alt="item3" src="/images/products/thumbnails/item3.jpg">
                        </figure>
                        <h5><a href="category.html#">Swiss Mobile Phone</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="64"></div>
                          </div>
                        </div>
                        <div class="featured-price">
                          $39
                        </div>
                      </div>
                      <div class="featured-product clearfix">
                        <figure>
                          <img alt="item4" src="/images/products/thumbnails/item4.jpg">
                        </figure>
                        <h5><a href="category.html#">Zwinzed HeadPhones</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="94"></div>
                          </div>
                        </div>
                        <div class="featured-price">
                          $18.99
                        </div>
                      </div>
                      <div class="featured-product clearfix">
                        <figure>
                          <img alt="item7" src="/images/products/thumbnails/item7.jpg">
                        </figure>
                        <h5><a href="category.html#">Kless Man Suit</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="74"></div>
                          </div>
                        </div>
                        <div class="featured-price">
                          $99
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="featured-product clearfix">
                        <figure>
                          <img alt="item4" src="/images/products/thumbnails/item4.jpg">
                        </figure>
                        <h5><a href="category.html#">Gap Graphic Cuffed</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="featured-price">
                          $17
                        </div>
                      </div>
                      <div class="featured-product clearfix">
                        <figure>
                          <img alt="item6" src="/images/products/thumbnails/item6.jpg">
                        </figure>
                        <h5><a href="category.html#">Women's Lauren Dress</a></h5>
                        <div class="ratings-container">
                          <div class="ratings">
                            <div class="ratings-result" data-result="84"></div>
                          </div>
                        </div>
                        <div class="featured-price">
                          $30
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget banner-slider-container">
                <div class="banner-slider flexslider">
                  <ul class="banner-slider-list clearfix">
                    <li>
                      <a href="category.html#"><img alt="Banner 1" src="/images/banner1.jpg"></a>
                    </li>
                    <li>
                      <a href="category.html#"><img alt="Banner 2" src="/images/banner2.jpg"></a>
                    </li>
                    <li>
                      <a href="category.html#"><img alt="Banner 3" src="/images/banner3.jpg"></a>
                    </li>
                  </ul>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection