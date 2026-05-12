@extends('website.layouts.mncofee')

@section('title', 'Home - '. ($ws->name ?? env('APP_NAME')))

@section('meta')
<meta name="description" content="{{ $ws->meta_description ?? 'Islamic Book BD offers authentic Islamic literature.' }}">
<meta name="keywords" content="{{ $ws->meta_keywords ?? 'Islamic Books, Quran, Hadith' }}">
<meta property="og:title" content="Home - {{ $ws->name ?? env('APP_NAME') }}">
<meta property="og:description" content="{{ $ws->meta_description ?? 'Discover authentic Islamic literature at Islamic Book BD.' }}">
<meta property="og:image" content="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->logo()]) }}">
<meta property="og:type" content="website">
<meta name="robots" content="index, follow">
@endsection

@push('css')
<style>
    /* Add any custom styles for the new layout here */
    .product-button .cart-action-wrapper {
        display: inline-block;
        width: 100%;
    }
    .product-button .btn-primary {
        background-color: #5B1E5D;
        border-color: #5B1E5D;
    }
    .product-button .btn-primary:hover {
        background-color: #451647;
        border-color: #451647;
    }
    .cartQtyDisplay {
        color: #000 !important;
    }

    /* Category Slider Modern UI */
    .category-area {
        background-color: #f9f9f9;
    }
    .single-category {
        transition: all 0.3s ease;
        padding: 20px 10px;
        background: #fff;
        border-radius: 15px;
        margin: 10px 5px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .single-category:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .category-img {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        transition: all 0.5s ease;
    }
    .single-category:hover .category-img {
        border-color: #5B1E5D;
    }
    .category-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s ease;
    }
    .single-category:hover .category-img img {
        transform: scale(1.1);
    }
    .category-info h5 {
        margin-bottom: 0;
        font-size: 16px;
        font-weight: 600;
        color: #333;
        transition: all 0.3s ease;
    }
    .single-category:hover .category-info h5 {
        color: #5B1E5D;
    }
    .category-active .owl-nav div {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: #5B1E5D !important;
        color: #fff !important;
        border-radius: 50%;
        line-height: 40px;
        text-align: center;
        font-size: 20px;
        opacity: 0;
        transition: all 0.3s ease;
    }
    .category-active:hover .owl-nav div {
        opacity: 1;
    }
    .category-active .owl-nav .owl-prev {
        left: -20px;
    }
    .category-active .owl-nav .owl-next {
        right: -20px;
    }
</style>
@endpush

@section('content')
    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            @foreach($sliders as $slider)
<div class="single-slider pt-125 pb-130 bg-img"
     style='background-image: url("{{ route('imagecache', ['template' => 'original', 'filename' => $slider->fi()]) }}");'>
                <div class="slider-width">
                    <div class="slider-content slider-animated-1 text-center">
                        <h1>{{ $slider->title }}</h1>
                        <h2>{{ $slider->sub_title ?? '' }}</h2>
                        <h3>{!! $slider->description !!}</h3>
                        @if($slider->link)
                            <a href="{{ $slider->link }}">Explore More</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- slider-area-end -->

    <!-- category-area-start -->
    <div class="category-area pt-80 pb-50 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Top Categories</h2>
                        <p>Explore our collection by categories</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="category-active owl-carousel">
                        @foreach($categories as $category)
                        @if($category->active == 1)
                        <div class="single-category text-center">
                            <a href="{{ route('productCategory', $category->slug) }}">
                                <div class="category-img mb-15">
                                    <img src="{{ route('imagecache', ['template' => 'medium', 'filename' => $category->fi()]) }}" alt="{{ $category->name_en }}">
                                </div>
                                <div class="category-info">
                                    <h5>{{ $category->name_en }}</h5>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- category-area-end -->

    <!-- banner-area-6-start -->
    {{--<div class="banner-area-6 pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-banner-8">
                        <div class="banner-img-2">
                            <a href="#"><img src="{{ asset('ebook/img/banner/30.jpg') }}" alt="banner" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-12">
                    <!-- banner-area-5-start -->
                    <div class="banner-area-5">
                        <div class="single-banner-4 xs-mb">
                            <div class="banner-shadow-hover">
                                <a href="#"><img src="{{ asset('ebook/img/banner/24.jpg') }}" alt="banner" /></a>
                            </div>
                        </div>
                        <div class="single-banner-5">
                            <div class="banner-shadow-hover">
                                <a href="#"><img src="{{ asset('ebook/img/banner/23.jpg') }}" alt="banner" /></a>
                            </div>
                        </div>
                    </div>
                    <!-- banner-area-5-end -->
                </div>
            </div>
        </div>
    </div>--}}
    <!-- banner-area-6-end -->

    <!-- product-area-start -->
    <div class="product-area pt-90 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>{{ $content->meta['process_title'] ?? 'Top Interesting' }}</h2>
                        <p>{{ $content->meta['process_subtitle'] ?? 'Browse the collection of our best selling and top interesting products.' }}</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- tab-menu-start -->
                    <div class="tab-menu mb-40 text-center">
                        <ul class="nav justify-content-center">
                            <li><a class="active" href="#NewArrival" data-bs-toggle="tab">New Arrival </a></li>
                            <li><a href="#OnSale" data-bs-toggle="tab">OnSale</a></li>
                            <li><a href="#Featured" data-bs-toggle="tab">Featured Products</a></li>
                        </ul>
                    </div>
                    <!-- tab-menu-end -->
                </div>
            </div>
            <!-- tab-area-start -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="NewArrival">
                    <div class="tab-active owl-carousel">
                        @foreach($latest_products->chunk(2) as $chunk)
                        <div class="tab-total">
                            @foreach($chunk as $product)
                                @include('frontend.home.includes.product_item', ['product' => $product, 'class' => $loop->first ? 'mb-40' : ''])
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="OnSale">
                    <div class="tab-active owl-carousel">
                        @foreach($sale_products->chunk(2) as $chunk)
                        <div class="tab-total">
                            @foreach($chunk as $product)
                                @include('frontend.home.includes.product_item', ['product' => $product, 'class' => $loop->first ? 'mb-40' : ''])
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="Featured">
                    <div class="tab-active owl-carousel">
                        @foreach($feature_products->chunk(2) as $chunk)
                        <div class="tab-total">
                            @foreach($chunk as $product)
                                @include('frontend.home.includes.product_item', ['product' => $product, 'class' => $loop->first ? 'mb-40' : ''])
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- tab-area-end -->
        </div>
    </div>
    <!-- product-area-end -->

    <!-- banner-area-2-start -->
    {{--<div class="banner-area-2 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-img-2">
                        <a href="#"><img src="{{ asset('ebook/img/banner/25.jpg') }}" alt="banner" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- banner-area-2-end -->

    <!-- bestseller-area-start -->
    {{--<div class="bestseller-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="bestseller-content">
                        <h1>Bestseller</h1>
                        <h2>books</h2>
                        <p class="categories">Shop all best seller books</p>
                        <div class="bestseller-active owl-carousel">
                            @foreach($best_products as $product)
                            <div class="single-bestseller">
                                @include('frontend.home.includes.product_item', ['product' => $product])
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="banner-img-2">
                        <a href="#"><img src="{{ asset('ebook/img/banner/26.jpg') }}" alt="banner" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- bestseller-area-end -->

    <!-- testimonial-area-start -->
    <div class="testimonial-area ptb-100 bg">
        <div class="container">
            <div class="row">
                <div class="testimonial-active owl-carousel">
                    @foreach($testimonials as $testimonial)
                    <div class="col-lg-12">
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <a href="#"><i class="fa fa-quote-right"></i></a>
                            </div>
                            <div class="testimonial-text">
                                <p>{!! $testimonial->text_en !!}</p>
                                <a href="#"><span>{{ $testimonial->name }} </span>/ {{ $testimonial->designation }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial-area-end -->

    <!-- product-area-4-start -->
    <div class="product-area-4 pb-100 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel">
                @foreach($popular_products->chunk(2) as $chunk)
                <div class="tab-total">
                    @foreach($chunk as $product)
                        @include('frontend.home.includes.product_item', ['product' => $product, 'class' => $loop->first ? 'mb-40' : ''])
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- product-area-4-end -->

    <!-- recent-post-area-start -->
    <div class="recent-post-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-30">
                        <h2>Latest Blog Posts</h2>
                    </div>
                </div>
                <div class="post-active owl-carousel">
                    @foreach($newses as $post)
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="{{ route('singleNews', $post->id) }}">
                                    <img src="{{ route('imagecache', ['template' => 'large', 'filename' => $post->fi()]) }}" alt="{{ $post->title }}" />
                                </a>
                                <div class="blog-date-time">
                                    <span class="day-time">{{ $post->created_at->format('d') }}</span>
                                    <span class="moth-time">{{ $post->created_at->format('M') }}</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="{{ route('singleNews', $post->id) }}">{{ $post->title }}</a></h3>
                                <span class="meta-author"> {{ $post->author->name ?? 'Admin' }} </span>
                                <p>{{ Str::limit(strip_tags($post->description), 120) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- recent-post-area-end -->

    <!-- social-group-area-start -->
    <div class="social-group-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title-3">
                        <h3>Latest Tweets</h3>
                    </div>
                    <div class="twitter-content">
                        <div class="twitter-icon">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                        <div class="twitter-text">
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum notare quam</p>
                            <a href="#">koparion</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title-3">
                        <h3>Stay Connected</h3>
                    </div>
                    <div class="link-follow">
                        <ul>
                            <li><a href="{{ $ws->twitter_link ?? '#' }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $ws->facebook_link ?? '#' }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $ws->youtube_link ?? '#' }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{ $ws->instagram_link ?? '#' }}"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social-group-area-end -->

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        {{-- Modal content can be dynamic or static --}}
    </div>
    <!-- Modal end -->
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Category Slider Initialization
    $('.category-active').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        autoplay: true,
        dots: false,
        loop: true,
        margin: 20,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 5
            },
            1200: {
                items: 6
            }
        }
    });

    // Add to Cart
    $(document).on("click", ".addToCart", function () {
        let btn = $(this);
        let url = btn.data("url");
        let product_id = btn.data("product");
        let qty = parseInt(btn.closest(".cart-action-wrapper").find(".product_qty").val()) || 1;

        $.post(url, { product: product_id, qty: qty }, function (res) {
            if (res.status) {
                // Find the specific container for this product to update its HTML
                $(`.productCartItem[data-product="${product_id}"]`).html(res.productCartItem);
                
                $(".cartCount").text(res.cartCount);
                $(".cartItemsCount").text(res.cartItemsCount);
                if(res.cartTotal) {
                    $(".cartTotalPrice").text(parseFloat(res.cartTotal).toFixed(2) + " tk");
                }

                Swal.fire({
                    toast: true, 
                    icon: "success", 
                    title: res.message,
                    position: "top-end", 
                    timer: 2000, 
                    showConfirmButton: false
                });
            }
        }).fail(() => {
            Swal.fire("Error", "Could not add to cart.", "error");
        });
    });

    // Update Cart Item
    $(document).on('click', '.updateCartItem', function (e) {
        e.preventDefault();

        let $btn = $(this);
        let cartId = $btn.data('cart');
        let url = $btn.data('url');
        let $wrapper = $btn.closest('.cart-action-wrapper');
        let product_id = $wrapper.data('product');
        let qty = parseInt($wrapper.find('.cartQtyDisplay').text()) || 0;

        if ($btn.hasClass('plus')) {
            qty++;
        } else if ($btn.hasClass('minus')) {
            qty--;
            if (qty < 0) qty = 0;
        }

        $btn.prop('disabled', true);

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                cart: cartId,
                new_qty: qty
            },
            success: function (res) {
                if (res.status) {
                    if (qty === 0) {
                        $wrapper.closest(".productCartItem").html(`
                            <div class="cart-action-wrapper" data-product="${product_id}">
                                <div class="add-to-cart-initial-btn">
                                    <button class="btn btn-primary btn-sm rounded-pill w-100 addToCart" 
                                            data-url="${res.add_to_cart_url}"
                                            data-product="${product_id}"
                                            style="height: 38px; background-color: #5B1E5D; border-color: #5B1E5D;">
                                        Buy Now
                                    </button>
                                    <input type="hidden" name="product_qty" value="1" class="product_qty">
                                </div>
                            </div>
                        `);
                    } else {
                        $wrapper.find('.cartQtyDisplay').text(qty);
                    }

                    $('.cartCount').text(res.cartCount);
                    $('.cartItemsCount').text(res.cartItemsCount);
                    if(res.cartTotal) {
                        $(".cartTotalPrice").text(parseFloat(res.cartTotal).toFixed(2) + " tk");
                    }
                }
            },
            error: function () {
                alert('Something went wrong! Please try again.');
            },
            complete: function () {
                $btn.prop('disabled', false);
            }
        });
    });
});
</script>
@endpush
