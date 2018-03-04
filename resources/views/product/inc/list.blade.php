<div class="row single-post mb-4 mr-3">
    <!--Card-->
    <div class="card mt-4 mx-3">

        <!--Card image-->
        <div class="view overlay hm-white-slight">
            <img src="{{$product->screen}}" class="img-fluid" alt="sample image">
            <a href="{{route('prod.view', [$product->id])}}">
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
        <!--/Card image-->

        <!-- Card footer -->
        <div class="card-data">
            <ul class="list-unstyled">
                <li><i class="fa fa-clock-o"></i> {{$product->created_at}}</li>
                @if ($product->price)
                    <li><i class="fa fa-rub"></i> {{$product->price}} за кв.м.</li>
                @endif
            </ul>
        </div>
        <!-- Card footer -->
    </div>
    <!--/Card-->
</div>