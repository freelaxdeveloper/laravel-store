<div id="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header-top-left">
            <ul class="clearfix" id="top-links">
              {{-- <li>
                <a href="#" title="Мой список желаний"><span class="top-icon top-icon-pencil"></span><span class="hide-for-xs">Мой список желаний</span></a>
              </li> --}}
              @auth
                <li>
                  <a href="{{ route('user.my') }}" title="Мой аккаунт"><span class="top-icon top-icon-user"></span><span class="hide-for-xs">Мой аккаунт</span></a>
                </li>
              @endauth
              <li>
                <a id="myBasket" data-toggle="modal" href="{{ route('basket', ['view']) }}" data-target="#basket"><span class="top-icon top-icon-cart"></span><span class="hide-for-xs">Моя корзина</span></a>
              </li>
              <li>
                <a href="{{ route('basket.oformit-zakaz') }}" title="Оформить заказ"><span class="top-icon top-icon-check"></span><span class="hide-for-xs">Оформить заказ</span></a>
              </li>
            </ul>
          </div>
          <div class="header-top-right">
            {{-- <div class="header-top-dropdowns pull-right">
              <div class="btn-group dropdown-money">
                <button class="btn btn-custom dropdown-toggle" data-toggle="dropdown" type="button"><span class="hide-for-xs">US Dollar</span><span class="hide-for-lg">$</span></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li>
                    <a href="index.html#"><span class="hide-for-xs">Euro</span><span class="hide-for-lg">&euro;</span></a>
                  </li>
                  <li>
                    <a href="index.html#"><span class="hide-for-xs">Pound</span><span class="hide-for-lg">&pound;</span></a>
                  </li>
                </ul>
              </div>
              <div class="btn-group dropdown-language">
                <button class="btn btn-custom dropdown-toggle" data-toggle="dropdown" type="button"><span class="flag-container"><img alt="flag of england" src="/images/england-flag.png"></span> <span class="hide-for-xs">English</span></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li>
                    <a href="index.html#"><span class="flag-container"><img alt="flag of england" src="/images/italy-flag.png"></span><span class="hide-for-xs">Italian</span></a>
                  </li>
                  <li>
                    <a href="index.html#"><span class="flag-container"><img alt="flag of italy" src="/images/spain-flag.png"></span><span class="hide-for-xs">Spanish</span></a>
                  </li>
                  <li>
                    <a href="index.html#"><span class="flag-container"><img alt="flag of france" src="/images/france-flag.png"></span><span class="hide-for-xs">French</span></a>
                  </li>
                  <li>
                    <a href="index.html#"><span class="sm-separator"><img alt="flag of germany" src="/images/germany-flag.png"></span><span class="hide-for-xs">German</span></a>
                  </li>
                </ul>
              </div>
            </div> --}}
            <div class="header-text-container pull-right">
              <p class="header-text">Твоя Мебель привествует тебя!</p>
              <p class="header-link">
                @guest
                  <a href="{{ route('login') }}">Войти</a>&nbsp;или&nbsp;<a href="{{ route('register') }}">создать учетную запись</a>
                @else 
                  <a href="{{ route('logout') }}"
									  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Выйти</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @endguest
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
