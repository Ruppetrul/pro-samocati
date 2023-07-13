<header class="pb-md-4 pb-0">
    <link rel="stylesheet" href="public/admin/plugins/fontawesome-free/css/all.min.css">

    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
{{--    <div class="header-top">--}}
{{--        <div class="container-fluid-lg">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xxl-9 col-lg-9 d-lg-block d-none">--}}
{{--                    <div class="header-offer">--}}
{{--                        <div class="notification-slider">--}}
{{--                            <div>--}}
{{--                                <div class="timer-notification">--}}
{{--                                    <h6><strong class="me-1">Добро пожаловать в {{ config('app.name') }}</strong>Wrap new offers/gift--}}
{{--                                        every signle day on Weekends.<strong class="ms-1">New Coupon Code: Fast024--}}
{{--                                        </strong>--}}

{{--                                    </h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div>--}}
{{--                                <div class="timer-notification">--}}
{{--                                    <h6>Something you love is now on sale!--}}
{{--                                        <a href="shop-left-sidebar.html" class="text-white">Buy Now--}}
{{--                                            !</a>--}}
{{--                                    </h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3">--}}
{{--                    <ul class="about-list right-nav-about">--}}
{{--                        <li class="right-nav-list">--}}
{{--                            <div class="dropdown theme-form-select">--}}
{{--                                <button class="btn dropdown-toggle" type="button" id="select-language"--}}
{{--                                        data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <img src="{{ asset('home/images/country/united-states.png') }}"--}}
{{--                                         class="img-fluid blur-up lazyload" alt="">--}}
{{--                                    <span>English</span>--}}
{{--                                    <i data-feather="chevron-down"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">--}}
{{--                                    <li>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0)" id="english">--}}
{{--                                            <img src="{{ asset('home/images/country/united-kingdom.png') }}"--}}
{{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
{{--                                            <span>English</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0)" id="france">--}}
{{--                                            <img src="{{ asset('home/images/country/germany.png') }}"--}}
{{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
{{--                                            <span>Germany</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0)" id="chinese">--}}
{{--                                            <img src="{{ asset('home/images/country/turkish.png') }}"--}}
{{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
{{--                                            <span>Turki</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="fa-solid fa-bars"></i>
                            </span>
                        </button>
                        <a href="{{  route('home.index') }}" class="web-logo nav-logo">
                            <h2> {{ env('APP_NAME') }}</h2>
{{--                            <img src="{{ asset('home/images/logo/1.png') }}" class="img-fluid blur-up lazyload" alt="">--}}
                        </a>
                        <div class="middle-box">
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Поиск временно не работает :("
                                           aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn" type="button" id="button-addon2">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                            <span class="input-group-text">
                                                <i data-feather="search" class="font-light"></i>
                                            </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                                <i data-feather="x" class="font-light"></i>
                                            </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
{{--                                <li class="right-side">--}}
{{--                                    <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">--}}
{{--                                        <i data-feather="heart"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <button type="button" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge">
                                                {{ count($cart_detail) }}
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                        </button>
                                        <div class="onhover-div">

                                            <ul class="cart-list">

                                                @if ($cart_detail)
                                                    @foreach($cart_detail as $product)
                                                        @include('Share::components.home.cart-products', ['product' => $product])
                                                    @endforeach
                                                @else
                                                    <p>Cart is empty.</p>
                                                @endif
                                            </ul>
                                            <div class="price-box">
                                                <h5>Сумма :</h5>
                                                <h4 class="theme-color fw-bold">
                                                    {{ $cart_total }} ₽
{{--                                                    {{ number_format(\Modules\Cart\Services\CartService::handleTotalPrice()) }} ₽--}}
                                                </h4>
                                            </div>
                                            <div class="button-group">
                                                <a id="cart_remove_all"
                                                   class="btn btn-sm cart-button theme-bg-color text-white">
                                                    Удалить все
                                                </a>
                                                <a href="{{ route('carts.home') }}" class="btn btn-sm cart-button">Сделать заказ</a>

{{--                                                <a href="{{ route('checkouts.home') }}" class="btn btn-sm cart-button">Checkout</a>--}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>Привет,</h6>
                                            <h5>пользователь</h5>
                                        </div>
                                    </div>
                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">
                                            @auth
{{--                                                <li class="product-box-contain">--}}
{{--                                                    <i></i>--}}
{{--                                                    <a href="log-in.html">Профиль</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="product-box-contain">--}}
{{--                                                    <a href="sign-up.html">Заказы</a>--}}
{{--                                                </li>--}}
                                                <li class="product-box-contain">
                                                    <a href="{{ route('logout') }}">Выход</a>
                                                </li>
                                                @if (auth()->user()->is_admin === 1)
                                                    <li class="product-box-contain">
                                                        <a href="{{ route('admin') }}">Админка</a>
                                                    </li>
                                                @endif
                                            @else
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href="{{ route('login') }}">Войти</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('register') }}">Регистрация</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('password.request') }}">Забыл пароль</a>
                                                </li>
                                            @endauth
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-middle">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link ps-xl-2 ps-0" href="{{ route('home.index') }}">
                                                Главная
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="{{ route('products.home') }}">
                                                Продукты
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown dropdown-mega">
                                            <a class="nav-link dropdown-toggle ps-xl-2 ps-0" href="javascript:void(0)"
                                               data-bs-toggle="dropdown">Категории
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-2 row g-3">
                                                @foreach ($categories->chunk(7) as $category)
                                                    <div class="dropdown-column col-xl-3">
                                                        @foreach ($category as $cat)
                                                            <a class="dropdown-item" href="{{ $cat->path() }}">
                                                                {{ $cat->title }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>
{{--                                        <li class="nav-item dropdown">--}}
{{--                                            <a class="nav-link" href="{{ route('blog.home') }}">--}}
{{--                                                Блог--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item dropdown">--}}
{{--                                            <a class="nav-link" href="{{ route('about-us.home') }}">--}}
{{--                                                О нас--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link nav-link-2" href="{{ route('contacts.create') }}">--}}
{{--                                                Оставить сообщение--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="header-nav-right">--}}
{{--                        <a class="btn deal-button" href="">--}}
{{--                            <i data-feather="zap"></i>--}}
{{--                            <span>Deal Today</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</header>

<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
<script>
    console.log('header set');
    $(document).ready(function() {
        console.log('header set');
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $('#cart_remove_all').click( function() {
            console.log('click');
            var url = "/cart/delete/all";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "_token": document.querySelector('meta[name="csrf-token"]').content,
                },
                success: function (data) {
                    location. reload()
                    console.log('Error:', data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>

