<div class="col-xs-12 col-sm-4 col-md-4">
    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
        <div class="mainflip">
            <div class="frontside">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="{{$image}}" alt="card image"></p>
                        <h4 class="card-title">{{$title}}</h4>
                        <p class="card-text">{{$description_small}}</p>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="backside col-md-12">
                <div class="card">
                    <div class="card-body text-center mt-4">
                        <h4 class="card-title">{{$title}}</h4>
                        <p><a href="{{$url}}"><img class=" img-fluid" src="{{$image}}" alt="card image" width="200"></a></p>
                        <p class="card-text">{{$description}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                    <i class="fa fa-google"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="actions">
                            @foreach ($button as $action)
                                <a href="{{$action['url']}}">{{$action['title']}}</a>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>