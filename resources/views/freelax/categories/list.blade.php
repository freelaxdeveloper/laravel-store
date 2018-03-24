@extends('layouts.app')

@section('title', 'Категории')

@section('css')
    <link href="{{elixir('css/tree.css')}}" rel="stylesheet">
@endsection

@section('content')
    <section class="section extra-margins listing-section mt-2 col-xl-7 col-md-12">
        <h4 class="font-bold"><strong>Категории</strong></h4>
        <hr class="red title-hr">
        <section class="mb-4 mt-4">
            <div class="row">
                <div class="col-lg-12">
                    Категории: <a href="{{route('cat.new')}}">[+]</a>
                    <form>
                    <div class="tree">
                        @each('categories.tree.listing', $categories, 'category')
                    </div>
                    <input type="reset" value="Collapse All">
                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection