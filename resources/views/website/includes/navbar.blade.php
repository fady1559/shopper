<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="{{ route('shop.search') }}" method="GET" class="site-block-top-search d-flex align-items-center">
                        <span class="icon icon-search2"></span>
                        <input type="text" name="query" class="form-control border-0" placeholder="{{ __('website/includes/navbar.Search') }}">
                        <button type="submit" class="btn btn-primary ml-2" style="border-radius: 50px; padding: 5px 20px;">{{ __('website/includes/navbar.Search') }}</button>
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="{{ route('shop')}}" class="js-logo-clone">{{ __('website/includes/navbar.Shoppers') }}</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>

                            @auth
                                @if(auth()->user()->User_Type == 'customer')
                                    <li><a href="{{ route('wishlist.index') }}" class="text-decoration-none text-danger"><span class="icon icon-heart"></span></a></li>
                                    <li>
                                        <a href="{{ route('cart.index') }}" class="site-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            <span class="count">{{ Cart::getContent()->count() }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endauth

                            <li style="margin-right:-10px">
                                @auth
                                    <a href="javascript:void(0)" class="text-decoration-none">{{ auth()->user()->name ?? '' }}</a>
                                @endauth
                                @guest
                                    <a>{{ 'guest_' . uniqid() }}</a>
                                @endguest
                            </li>

                            <a type="button" class="dropdown-toggle p-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-person"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if(auth()->user())
                                    <button type="button" class="dropdown-item" onclick="location.href='{{ route('website.profile') }}'">
                                        <i class="fa-solid fa-user pr-2"></i>{{ __('website/includes/navbar.Profile') }}
                                    </button>

                                    @if(auth()->user()->User_Type == 'admin' || auth()->user()->User_Type == 'moderator')
                                        <button type="button" class="dropdown-item" onclick="window.location.href='{{ route('dashboard') }}'">
                                            <i class="fas fa-tachometer-alt pr-2"></i>{{ __('website/includes/navbar.Dashboard') }}
                                        </button>
                                    @endif
                                    <a class="d-block ml-4" style="cursor:pointer" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>{{ __('website/includes/navbar.Log Out') }}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                @else
                                    <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('login') }}'">{{ __('website/includes/navbar.Login') }}</button>
                                    <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('register') }}'">{{ __('website/includes/navbar.Register') }}</button>
                                @endif
                            </div>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a href="{{ route('home') }}">{{ __('website/includes/navbar.Home') }}</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                    <a href="{{ route('about') }}">{{ __('website/includes/navbar.About') }}</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'shop' ? 'active' : '' }}">
                    <a href="{{ route('shop') }}">{{ __('website/includes/navbar.Shop') }}</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'catalog' ? 'active' : '' }}">
                    <a href="{{ route('catalog') }}">{{ __('website/includes/navbar.Catalogs') }}</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'new.arrivals' ? 'active' : '' }}">
                    <a href="{{ route('new.arrivals') }}">{{ __('website/includes/navbar.New Arrivals') }}</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                    <a href="{{ route('contact') }}">{{ __('website/includes/navbar.Contact') }}</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
