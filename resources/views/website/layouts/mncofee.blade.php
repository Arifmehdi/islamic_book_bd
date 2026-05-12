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
    <!-- bootstrap v5.2.2 css -->
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

        /* Ensure SweetAlert2 Toasts are always on top */
        .swal2-container {
            z-index: 100000001 !important;
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

    <!-- Global Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-content">
                    <div class="text-center p-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

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
    <script>
        $(document).ready(function() {
            // Global Quick View Logic
            $(document).on('click', '.action-view', function() {
                let id = $(this).data('id');
                let url = $(this).data('url');
                let addToCartUrl = "{{ route('addToCart') }}";
                
                $('#modal-body-content').html(`
                    <div class="text-center p-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                `);

                $.ajax({
                    url: url,
                    method: 'GET',
                    data: { id: id },
                    success: function(res) {
                        let html = `
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="modal-tab">
                                        <div class="product-details-large">
                                            <img src="${res.image}" alt="${res.name}" class="img-fluid rounded w-100" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="modal-pro-content">
                                        <h3 class="mb-2">${res.name}</h3>
                                        <div class="price mb-3">
                                            <span class="fs-4 fw-bold text-primary">৳${res.price}</span>
                                        </div>
                                        <p class="mb-4">${res.description}</p>
                                        <div class="productCartItem" data-product="${id}">
                                            <div class="cart-action-wrapper d-flex align-items-center gap-3" data-product="${id}">
                                                <div class="quantity">
                                                    <input type="number" value="1" min="1" class="form-control product_qty" style="width: 80px;" />
                                                </div>
                                                <button class="btn btn-primary addToCart" 
                                                        data-url="${addToCartUrl}" 
                                                        data-product="${id}"
                                                        style="background-color: #5B1E5D; border-color: #5B1E5D;">
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <span class="text-success"><i class="fa fa-check-circle me-1"></i> In stock</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#modal-body-content').html(html);
                    },
                    error: function() {
                        $('#modal-body-content').html('<div class="alert alert-danger m-3">Could not load product details.</div>');
                    }
                });
            });
        });
    </script>
    @stack('js')
</body>
</html>
