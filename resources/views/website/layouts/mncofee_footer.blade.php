<!-- footer-area-start -->
<footer>
    <!-- footer-top-start -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-top-menu bb-2">
                        <nav>
                            <ul>
                                <li><a href="{{ route('home') }}">home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">contact us</a></li>
                                <li><a href="{{ route('news') }}">blog</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top-start -->
    <!-- footer-mid-start -->
    <div class="footer-mid ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-footer br-2 xs-mb">
                                <div class="footer-title mb-20">
                                    <h3>Products</h3>
                                </div>
                                <div class="footer-mid-menu">
                                    <ul>
                                        <li><a href="{{ route('shop') }}">All Books</a></li>
                                        <li><a href="{{ route('shop') }}">New products</a></li>
                                        <li><a href="{{ route('shop') }}">Best sales</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-footer br-2 xs-mb">
                                <div class="footer-title mb-20">
                                    <h3>Our company</h3>
                                </div>
                                <div class="footer-mid-menu">
                                    <ul>
                                        <li><a href="{{ route('contact') }}">Contact us</a></li>
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                        @guest
                                            <li><a href="{{ route('register') }}">My account </a></li>
                                        @else
                                            @if(auth()->user()->hasRole('admin'))
                                                <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                            @else
                                                <li><a href="{{ route('user.dashboard') }}">My account </a></li>
                                            @endif
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-footer br-2 xs-mb">
                                <div class="footer-title mb-20">
                                    <h3>Your account</h3>
                                </div>
                                <div class="footer-mid-menu">
                                    <ul>
                                        <li><a href="{{ route('user.dashboard') }}">Addresses</a></li>
                                        <li><a href="{{ route('user.dashboard') }}">Orders</a></li>
                                        <li><a href="{{ route('user.dashboard') }}">Personal info</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="single-footer mrg-sm">
                        <div class="footer-title mb-20">
                            <h3>STORE INFORMATION</h3>
                        </div>
                        <div class="footer-contact">
                            <p class="adress">
                                <span>{{ $ws->name }}</span>
                                {{ $ws->contact_address }}
                            </p>
                            <p><span>Call us now:</span> {{ $ws->contact_phone }}</p>
                            <p><span>Email:</span> {{ $ws->contact_email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-mid-end -->
    <!-- footer-bottom-start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row bt-2">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="copy-right-area">
                        <p>&copy; {{ date('Y') }} <strong> {{ $ws->name }} </strong> Powered by <a href="https://phenexsoft.com/" target="_blank"><strong>Phenexsoft IT</strong></a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="payment-img text-end">
                        <a href="#"><img src="{{ asset('ebook/img/1.png') }}" alt="payment" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom-end -->
</footer>
<!-- footer-area-end -->
