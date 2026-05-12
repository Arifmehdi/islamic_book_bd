<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', $ws->name ?? 'Islamic Book BD')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{ asset('ebook/css/bootstrap.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('ebook/css/animate.css') }}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('ebook/css/meanmenu.min.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('ebook/css/owl.carousel.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('ebook/css/font-awesome.min.css') }}">
    <!-- flexslider.css-->
    <link rel="stylesheet" href="{{ asset('ebook/css/flexslider.css') }}">
    <!-- chosen.min.css-->
    <link rel="stylesheet" href="{{ asset('ebook/css/chosen.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('ebook/style.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('ebook/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('ebook/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    
    <style>
        :root {
            --primary-color: #5B1E5D;
            --secondary-color: #8BCB7A;
            --accent-color: #2E6B3A;
            --bg-cream: #F4E8C8;
            --text-charcoal: #2B2B2B;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @stack('css')
</head>

<body class="home-6">
    @include('website.layouts.mncofee_header')

    <main>
        @yield('content')
    </main>

    @include('website.layouts.mncofee_footer')

    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="{{ asset('ebook/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('ebook/js/bootstrap.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('ebook/js/owl.carousel.min.js') }}"></script>
    <!-- meanmenu js -->
    <script src="{{ asset('ebook/js/jquery.meanmenu.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('ebook/js/wow.min.js') }}"></script>
    <!-- jquery.parallax-1.1.3.js -->
    <script src="{{ asset('ebook/js/jquery.parallax-1.1.3.js') }}"></script>
    <!-- jquery.countdown.min.js -->
    <script src="{{ asset('ebook/js/jquery.countdown.min.js') }}"></script>
    <!-- jquery.flexslider.js -->
    <script src="{{ asset('ebook/js/jquery.flexslider.js') }}"></script>
    <!-- chosen.jquery.min.js -->
    <script src="{{ asset('ebook/js/chosen.jquery.min.js') }}"></script>
    <!-- jquery.counterup.min.js -->
    <script src="{{ asset('ebook/js/jquery.counterup.min.js') }}"></script>
    <!-- waypoints.min.js -->
    <script src="{{ asset('ebook/js/waypoints.min.js') }}"></script>
    <!-- plugins js -->
    <script src="{{ asset('ebook/js/plugins.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('ebook/js/main.js') }}"></script>
    @stack('js')
</body>
</html>
