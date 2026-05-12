<!-- header-area-start -->
<header>
    <!-- header-top-area-start -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    {{--<div class="language-area">
                        <ul>
                            <li><img src="{{ asset('ebook/img/flag/1.jpg') }}" alt="flag" /><a href="#">English<i class="fas fa-angle-down"></i></a>
                                <div class="header-sub">
                                    <ul>
                                        <li><a href="#"><img src="{{ asset('ebook/img/flag/2.jpg') }}" alt="flag" />france</a></li>
                                        <li><a href="#"><img src="{{ asset('ebook/img/flag/3.jpg') }}" alt="flag" />croatia</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#">USD $<i class="fas fa-angle-down"></i></a>
                                <div class="header-sub dolor">
                                    <ul>
                                        <li><a href="#">EUR €</a></li>
                                        <li><a href="#">USD $</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>--}}
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="account-area text-end">
                        <ul>
                            @auth
                                @if(auth()->user()->hasRole('admin'))
                                    <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                    <li><a href="{{ route('user.dashboard') }}">Member Dashboard</a></li>
                                @else
                                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                @endif
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Sign in</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                            <li><a href="{{ route('new.checkout') }}">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-top-area-end -->
    <!-- header-mid-area-start -->
    <div class="header-mid-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-12">
                    <div class="header-search">
                        <form action="{{ route('search') }}" method="GET" id="header-search-form">
                            <input type="text" name="parameter" placeholder="Search entire store here..." />
                            <a href="javascript:void(0)" onclick="document.getElementById('header-search-form').submit();"><i class="fas fa-search"></i></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="{{ route('home') }}">
                            <img src="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->logo_alt()]) }}" alt="{{ $ws->name }}" style="max-height: 80px;" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="my-cart">
                        <ul>
                            <li>
                                <a href="{{ route('new.checkout') }}"><i class="fas fa-shopping-cart"></i>My Cart</a>
                                <span class="cartCount">{{ App\Models\Cart::cartCount() }}</span>
                                {{-- Mini cart can be added here following sample structure if needed --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-mid-area-end -->
    <!-- main-menu-area-start -->
    <div class="main-menu-area d-md-none d-none d-lg-block" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-center-wrap">
                        <div class="menu-area">
                            <nav>
                                <ul>
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('shop') }}">Books<i class="fas fa-angle-down"></i></a>
                                        <div class="mega-menu">
                                            @foreach($productCategories->chunk(4) as $chunk)
                                                @foreach($chunk as $category)
                                                <span>
                                                    <a href="{{ route('productCategory', $category->slug) }}" class="title">{{ $category->name_en }}</a>
                                                    @foreach($category->children as $child)
                                                        <a href="{{ route('productCategory', $child->slug) }}">{{ $child->name_en }}</a>
                                                    @endforeach
                                                </span>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </li>
                                    {{--<li class="{{ request()->routeIs('shop') ? 'active' : '' }}"><a href="{{ route('shop') }}">Shop</a></li>--}}
                                    <li class="{{ request()->routeIs('news') ? 'active' : '' }}"><a href="{{ route('news') }}">Blog</a></li>
                                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About Us</a></li>
                                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        {{--<div class="safe-area">
                            <a href="{{ route('shop') }}">sales off</a>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-menu-area-end -->
    <!-- mobile-menu-area-start -->
    <div class="mobile-menu-area d-lg-none d-block fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul id="nav">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('shop') }}">Books</a>
                                    <ul>
                                        @foreach($productCategories as $category)
                                            <li><a href="{{ route('productCategory', $category->slug) }}">{{ $category->name_en }}</a>
                                                @if($category->children->count() > 0)
                                                    <ul>
                                                        @foreach($category->children as $child)
                                                            <li><a href="{{ route('productCategory', $child->slug) }}">{{ $child->name_en }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                {{--<li><a href="{{ route('shop') }}">Shop</a></li>--}}
                                <li><a href="{{ route('news') }}">Blog</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-end -->
</header>
<!-- header-area-end -->
