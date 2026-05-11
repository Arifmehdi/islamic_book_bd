<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', $ws->name ?? 'Cafeu')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        <link rel="shortcut icon" type="image/png" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
        <link rel="stylesheet" href="{{ asset('mncofee/assets/css/bootstrap/bootstrap.min.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&amp;family=Jost&amp;family=Nunito&amp;family=Oswald:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('mncofee/assets/font-awesome/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('mncofee/assets/css/animation/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('mncofee/assets/css/aida-home-styles.css') }}">
        <style>
            :root {
                --primary-color: #5B1E5D; /* Deep Purple */
                --secondary-color: #8BCB7A; /* Mint Green */
                --accent-color: #2E6B3A; /* Dark Green */
                --bg-cream: #F4E8C8; /* Cream */
                --text-charcoal: #2B2B2B; /* Charcoal */
            }

            body {
                background-color: var(--bg-cream);
                color: var(--text-charcoal);
                font-family: 'Jost', sans-serif;
            }

            /* Header & Navbar */
            header {
                background-color: #ffffff !important;
                border-bottom: 3px solid var(--primary-color);
            }

            .ad-nav-anchor, .ad-header-pages-container a {
                color: var(--text-charcoal) !important;
            }

            .ad-nav-anchor:hover, .ad-header-pages-container a:hover {
                color: var(--primary-color) !important;
            }

            .ad-header-pages-container button, 
            .ad-responsive-btn button,
            .navbar-offcanvas-search button,
            .ad-footer-subscribe button {
                background-color: var(--primary-color) !important;
                color: #fff !important;
                border-radius: 5px !important;
                transition: 0.3s ease;
            }

            .ad-header-pages-container button:hover, 
            .ad-responsive-btn button:hover,
            .navbar-offcanvas-search button:hover,
            .ad-footer-subscribe button:hover {
                background-color: var(--accent-color) !important;
            }

            .ad-cart-count {
                background-color: var(--secondary-color) !important;
                color: var(--primary-color) !important;
                font-weight: bold;
            }

            .ad-search-icon:hover, .ad-header-menubar:hover {
                background-color: var(--secondary-color) !important;
                color: var(--primary-color) !important;
            }

            /* Footer */
            .ad-footer {
                background-color: var(--primary-color) !important;
                background-image: none !important;
                color: #ffffff !important;
            }

            .ad-footer h4, .ad-footer h5 {
                color: var(--secondary-color) !important;
            }

            .ad-footer p, .ad-footer a {
                color: #f8f9fa !important;
            }

            .ad-footer a:hover {
                color: var(--secondary-color) !important;
            }

            .ad-footer-border {
                border-top: 1px solid rgba(255,255,255,0.1) !important;
            }

            .ad-footer-bottom {
                background-color: #451647 !important; /* Slightly darker purple */
            }

            /* Forms */
            input:focus {
                border-color: var(--primary-color) !important;
                box-shadow: 0 0 0 0.2rem rgba(91, 30, 93, 0.25) !important;
            }

            /* Preloader */
            .container-preloader .animation-preloader .spinner {
                border-top-color: var(--primary-color) !important;
            }

            /* Selection */
            ::selection {
                background: var(--secondary-color);
                color: var(--primary-color);
            }

            main {
                min-height: 70vh;
            }
        </style>
        @stack('css')
    </head>
    <body>
        <div id="preloader">
            <div id="container" class="container-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                </div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>

        @include('website.layouts.mncofee_header')

        <main>
            @yield('content')
        </main>

        @include('website.layouts.mncofee_footer')

        <!-- Script -->
        <script src="{{ asset('mncofee/assets/js/fslightbox/fslightbox.js') }}"></script>
        <script src="{{ asset('mncofee/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('mncofee/assets/js/jquery.nice-select.min.js') }}"></script>
        
        <!-- Aos Animation -->
        <script src="{{ asset('mncofee/assets/js/animation/aos.js') }}"></script>

        <!-- GSAP Effect-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

        <!-- Preloader & Init -->
        <script src="{{ asset('mncofee/assets/js/jquery/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                // GSAP Animations
                gsap.registerPlugin(ScrollTrigger);
                let bannerContainers = document.querySelectorAll(".ad-banner-person");
                let aboutContainers = document.querySelectorAll(".ad-about-image-container");

                const animateGSAP = (containers) => {
                    containers.forEach((container) => {
                        let image = container.querySelector("img");
                        let tl = gsap.timeline({
                            scrollTrigger: {
                                trigger: container,
                                toggleActions: "restart none none reset"
                            }
                        });
                        tl.set(container, { autoAlpha: 1 });
                        tl.from(container, 1.5, { xPercent: -100, ease: "power2.out" });
                        tl.from(image, 1.5, { xPercent: 100, scale: 1.3, delay: -1.5, ease: "power2.out" });
                    });
                };
                animateGSAP(bannerContainers);
                animateGSAP(aboutContainers);

                // Preloader Removal
                setTimeout(function() {
                    $('#container').addClass('loaded');
                    if ($('#container').hasClass('loaded')) {
                        $('#preloader').delay(500).queue(function() {
                            $(this).remove();
                            // Initialize AOS after preloader is gone
                            if (typeof AOS !== 'undefined') {
                                AOS.init({
                                    duration: 800,
                                    once: true
                                });
                            }
                        });
                    }
                }, 500);
            });
        </script>
        @stack('js')
    </body>
</html>
