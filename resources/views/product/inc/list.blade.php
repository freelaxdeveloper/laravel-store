<div class="row single-post mb-4 mr-3">
    <!--Card-->
    <div class="card mt-4 mx-3">

        <!--Card image-->
        <div class="view overlay hm-white-slight" itemscope itemtype="http://schema.org/Product">
            <img itemprop="image" src="{{$product->screen}}" class="img-fluid" alt="sample image">
            <a href="{{route('prod.view', [$product->id])}}" itemprop="url">
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
        <!--/Card image-->

        <!-- Card footer -->
        <div class="card-data">
            <ul class="list-unstyled">
                <li><i class="fa fa-clock-o"></i> <meta itemprop="datePublished" content="{{$product->created_at}}">{{$product->created_at}}</li>
                @if ($product->price)
                <li itemprop="offers" itemscope itemtype="http://schema.org/Offer"><i class="fa fa-rub"></i> <span itemprop="price" content="{{$product->price}}">{{number_format($product->price)}}</span> <span itemprop="priceCurrency" content="RUB">руб.</span> {{$product->type}}</li>
                @endif
            </ul>
        </div>
        <!-- Card footer -->
    </div>
    <!--/Card-->
</div>