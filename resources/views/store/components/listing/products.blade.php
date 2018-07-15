@foreach ($products as $product)
  @include('components.listing.product', ['product' => $product]) 
@endforeach
