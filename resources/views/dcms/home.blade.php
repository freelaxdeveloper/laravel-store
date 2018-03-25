@extends('layouts.app')

@section('title', 'DCMSX - CMS система управления сайтом')

@section('meta')
<link rel="canonical" href="{{url('/')}}/"/>
@endsection

@section('content')
    <!-- Team -->
    <section id="team">
        <div class="row">
            @foreach ($products as $product)
                @include('listing.card', [
                    'title' => $product->title,
                    'url' => route('prod.view', [$product->id]),
                    'description' => $product->description,
                    'description_small' => $product->description,
                    'image' => $product->screen,
                    'button' => [
                        ['url' => '#', 'title' => '2 Comments'],
                        ['url' => '#', 'title' => '8 Shares'],
                    ],
                ])
            @endforeach
        </div>
    </section>
    {{ $products->links() }}
    <!-- Team -->
@endsection