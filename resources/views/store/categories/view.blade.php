@extends('layouts.app')

@section('title', $category->name)

@section('meta')
    <link rel="canonical" href="{{route('cat.view', [$category])}}"/>
@endsection


@section('content')
<section id="content">
    <div id="category-breadcrumb">
      <div class="container">
        <ul class="breadcrumb">
          <li>
            <a href="index.html">Главная</a>
          </li>
          @foreach ($category->getAncestorsAndSelf() as $breadcrumbs)
            <li>
              <a href="{{route('cat.view', [$breadcrumbs])}}?{{ request()->getQueryString() }}" class="@if($loop->last)active @endif">{{$breadcrumbs->name}}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12 main-content">
              @if ($products->count())
                <div class="category-toolbar clearfix">
                  <div class="toolbox-filter clearfix">
                    <div class="sort-box">
                      <span class="separator">Сорт.:</span>
                      <div class="btn-group select-dropdown">
                        <button class="btn select-btn" type="button">Стоимость</button> <button class="btn dropdown-toggle" data-toggle="dropdown" type="button"><i class="fa fa-angle-down"></i></button>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a href="category.html#">Дате</a>
                          </li>
                          <li>
                            <a href="category.html#">Имени</a>
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
                      <span class="separator">Посмотреть:</span>
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
              @endif
              <div class="md-margin"></div>
              <div class="category-item-container">
                <div class="row">
                  @include('components.listing.products', ['products' => $products, 'grid' => true])
                </div>
              </div>
              @if ($products->count())
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
              @endif
            </div>
            <aside class="col-md-3 col-sm-4 col-xs-12 sidebar">
              <div class="widget">
                <div class="panel-group custom-accordion sm-accordion" id="category-filter">
                  <div class="panel">
                    <div class="accordion-header">
                      <div class="accordion-title">
                        <span>Категории</span>
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
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection