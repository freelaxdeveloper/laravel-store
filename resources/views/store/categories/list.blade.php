@extends('layouts.app')

@section('title', 'Категории')

@section('css')
    @parent
    <link href="{{elixir('css/tree.css')}}" rel="stylesheet">
@endsection

@section('content')
<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-9 col-sm-8 col-xs-12 main-content">
          <h4 class="font-bold"><strong>Категории</strong></h4>
          <div class="row">
            <div class="col-lg-12">
              Категории: <a href="{{route('cat.new')}}">[+]</a>
              <div class="tree">
                @each('categories.treeMenu.listing', $categories, 'category')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection