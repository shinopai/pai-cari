<header class="header">
  <div class="wrap">
    <div class="header__inner flex">
      <div class="header__item--before flex">
        <a href="/" class="contents">
          <h1 class="header__logo">
            <img src="{{ asset('images/logo_site.png') }}" alt="paicari logo">
          </h1>
        </a>
        <form action="" method="get" class="header__search-form flex">
          <input type="text" name="search" value="" class="header__search-form-text" placeholder="なにをお探しですか？">
          <input type="submit" value="" class="header__search-form-submit">
        </form>
      </div>
      <div class="header__item--after flex">
        <ul class="header__list flex">
          <li class="header__list-item">
            <a href="#" class="header__list-link">
              お知らせ
            </a>
          </li>
          @guest
          <li class="header__list-item">
            <a href="{{ route('login') }}" class="header__list-link">
              ログイン
            </a>
          </li>
          <li class="header__list-item">
            <a href="{{ route('register') }}" class="header__list-link">
              会員登録
            </a>
          </li>
          @else
          <li class="header__list-item account-btn" id="account_btn">
            <a href="" class="header__list-link not-link">
              アカウント
            </a>
            <ul id="account_menu" class="account-menu hidden">
              <li class="account-menu__item not-link">
                <div class="account-menu__data flex">
                  <div class="account-menu__img">
                    <img src="{{ asset('images/img_user.png') }}" alt="{{ Auth::user()->name }}" srcset="">
                  </div>
                  <p class="account-menu__name">{{ Auth::user()->name }}</p>
                </div>
              </li>
              <li class="account-menu__item">
                <a href="#" class="account-menu__link">
                  いいね！した商品
                </a>
              </li>
              <li class="account-menu__item">
                <a href="#" class="account-menu__link">
                  出品した商品
                </a>
              </li>
              <li class="account-menu__item not-link">
                <form method="POST" action="{{ route('logout') }}" class="account-menu__form">
                  @csrf
                  <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                  this.closest('form').submit();" class="account-menu__link--blue">
                    {{ __('ログアウト') }}
                  </x-responsive-nav-link>
                </form>
              </li>
            </ul>
          </li>
          @endguest
          <li class="header__list-item">
            <a href="#" class="header__list-link--red">
              出品
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
