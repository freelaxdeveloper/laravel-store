<div class="row single-post mb-4 mr-3">
    <!--Card-->
    <div class="card mt-4 mx-3">

        <!--Card image-->
        <div class="view overlay hm-white-slight" itemscope itemtype="http://schema.org/Product">
            <img itemprop="image" src="{{ $product->screen['image']->size(268, 319)->get('src') }}" class="img-fluid" alt="sample image">
            <a href="{{route('prod.view', [$product])}}" itemprop="url">
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
        <!--/Card image-->

        <!-- Card footer -->
        <div class="card-data">
            <ul class="list-unstyled">
                {{-- <li><i class="fa fa-clock-o"></i> <meta itemprop="datePublished" content="{{$product->created_at}}">{{$product->created_at}}</li> --}}
                @if ($product->price)
                    <li itemprop="offers" itemscope itemtype="http://schema.org/Offer"><i class="fa fa-rub"></i> <span itemprop="price" content="{{$product->price}}">{{number_format($product->price)}}</span> <span itemprop="priceCurrency" content="RUB">руб.</span></li>
                @else
                    подробности по телефону 
                @endif
                @if ($product->price_old)
                    - {{number_format($product->price_old)}} руб.
                @endif
                за @isset($product->options['running_meter']) п.м. @else кв.м. @endisset
            </ul>
        </div>
        <!-- Card footer -->
    </div>
    <!--/Card-->
</div>