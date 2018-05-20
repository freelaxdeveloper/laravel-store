<div class="row-chat">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Мини-Чат
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="{{ URL::full() }}"><span class="glyphicon glyphicon-refresh">
                            </span>Обновить</a></li>

                            @if (Auth::user() && Auth::user()->hasRole('admin'))
                                <li><a href="{{route('chat.clear')}}"><span class="glyphicon glyphicon-remove"></span>Очистить</a></li>
                            @endif
                            <li class="divider"></li>
                            @auth
                                <li><a href="#"><span class="glyphicon glyphicon-off"></span>
                                Выйти</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat">
                        @forelse ($chats as $chat)
                            @php
                                $class = Auth::user() && $chat->user->id == Auth::user()->id ? 'right' : 'left';
                            @endphp
                            <li class="{{$class}} clearfix">
                                <span class="chat-img pull-{{$class}}">
                                    <img width="48" src="{{$chat->user->avatar}}" alt="{{$chat->user->name}} Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        @if ($class == 'right')
                                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>{{$chat->created_at}}</small>
                                            <strong class="pull-right primary-font">{{$chat->user->name}}</strong>
                                        @else
                                            <strong class="primary-font">{{$chat->user->name}}</strong> <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span>{{$chat->created_at}}</small>
                                        @endif
                                        
                                    </div>
                                    <p>
                                        {{$chat->message}}
                                    </p>
                                </div>
                            </li>	
                        @empty
                            Сообщния еще не были добавлены
                        @endforelse
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        @auth
                        <form action="{{route('chat.add')}}" method="POST">
                            @csrf
                            <input name="message" id="btn-input" type="text" class="form-control input-sm" placeholder="Напишите что то умное..." />
                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-sm" id="btn-chat">
                                    {{lang('chat.Написать')}}</button>
                            </span>
                        </form>
                        @else
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="form-group">
                                    <label class="sr-only" for="emailAddress">Номер телефона</label>
                                    <input name="email" type="text" class="form-control" id="emailAddress" placeholder="Номер телефона" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="pwd">Пароль</label>
                                    <input name="password" type="password" class="form-control" id="pwd" placeholder="Пароль" required>
                                </div>
                                <button type="submit" class="btn btn-default">Войти</button>
                            </form>
    
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
