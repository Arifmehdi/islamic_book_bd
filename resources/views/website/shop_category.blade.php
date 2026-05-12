@extends('website.layouts.mncofee')

@section('title', 'All Books - '. ($ws->name ?? env('APP_NAME')))

@section('meta')
<meta name="description" content="Browse our extensive collection of Islamic books. Find Quran, Hadith, and more.">
<meta name="keywords" content="Islamic Books, Shop, Quran, Hadith, Bangladesh">
@endsection

@push('css')
<style>
    .breadcrumbs-area {
        background: #f7f7f7;
        padding: 30px 0;
    }
    .breadcrumbs-menu ul li {
        display: inline-block;
        margin-right: 20px;
        position: relative;
    }
    .breadcrumbs-menu ul li::before {
        content: "/";
        position: absolute;
        right: -13px;
        top: 0;
    }
    .breadcrumbs-menu ul li:last-child::before {
        display: none;
    }
    .breadcrumbs-menu ul li a {
        color: #333;
        text-transform: capitalize;
    }
    .breadcrumbs-menu ul li a.active {
        color: #5B1E5D;
    }
    .pagination-wrapper .pagination {
        justify-content: center;
    }
    
    /* Modern Filter Sidebar */
    .shop-left-sidebar {
        background: #fff;
        padding: 0;
    }
    .left-title-2 h2, .left-title h4 {
        font-size: 18px;
        font-weight: 700;
        color: #333;
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .left-title-2 h2:after, .left-title h4:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background: #5B1E5D;
    }
    .shop-menu ul li {
        margin-bottom: 8px;
        transition: all 0.3s ease;
    }
    .shop-menu ul li a {
        color: #666;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 0;
        font-size: 15px;
        transition: all 0.3s ease;
    }
    .shop-menu ul li a:hover, .shop-menu ul li.active a {
        color: #5B1E5D;
        padding-left: 5px;
    }
    .shop-menu ul li a span {
        background: #f0f0f0;
        color: #888;
        font-size: 12px;
        padding: 2px 8px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .shop-menu ul li a:hover span, .shop-menu ul li.active a span {
        background: #5B1E5D;
        color: #fff;
    }
    
    .price-filter-list li {
        margin-bottom: 10px;
    }
    .price-filter-list li a {
        color: #666;
        font-size: 14px;
        display: block;
        padding: 8px 12px;
        background: #f9f9f9;
        border-radius: 5px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }
    .price-filter-list li a:hover, .price-filter-list li.active a {
        background: #5B1E5D;
        color: #fff;
        border-color: #5B1E5D;
    }
    
    .custom-price-filter {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        margin-top: 15px;
    }
    .custom-price-filter input {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 10px;
        width: 100%;
        margin-bottom: 10px;
        font-size: 14px;
    }
    .custom-price-filter .btn-go {
        background: #5B1E5D;
        color: #fff;
        border: none;
        width: 100%;
        padding: 8px;
        border-radius: 4px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .custom-price-filter .btn-go:hover {
        background: #451647;
    }
    
    .clear-filters {
        margin-bottom: 25px;
    }
    .clear-filters a {
        display: block;
        text-align: center;
        padding: 10px;
        background: #fdeaea;
        color: #dc3545;
        border-radius: 5px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .clear-filters a:hover {
        background: #dc3545;
        color: #fff;
    }

    .toolbar {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .sorter-options {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 10px;
        font-size: 14px;
        color: #333;
    }
</style>
@endpush

@section('content')
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#" class="active">shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->

    <!-- shop-main-area-start -->
    <div class="shop-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2">
                    <div class="shop-left-sidebar">
                        
                        @if(request()->has('price') || request()->has('sort') || request()->has('search'))
                        <div class="clear-filters">
                            <a href="{{ route('shop') }}"><i class="fa fa-times-circle me-1"></i> Clear All Filters</a>
                        </div>
                        @endif

                        <div class="single-shop mb-40">
                            <div class="left-title-2">
                                <h2>Categories</h2>
                            </div>
                            <div class="shop-menu">
                                <ul>
                                    @foreach ($productCategories as $category)
                                        <li class="{{ request()->is('category/'.$category->slug) ? 'active' : '' }}">
                                            <a href="{{ route('productCategory', $category->slug) }}">
                                                {{ $category->name_en }}
                                                <span>{{ $category->products_count }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="single-shop mb-40">
                            <div class="left-title">
                                <h4>Filter by Price</h4>
                            </div>
                            <div class="left-menu mb-30">
                                <ul class="price-filter-list">
                                    <li class="{{ request()->get('price') == '0-99' ? 'active' : '' }}">
                                        <a href="{{ route('shop', array_merge(request()->query(), ['price' => '0-99'])) }}">৳0.00 - ৳99.99</a>
                                    </li>
                                    <li class="{{ request()->get('price') == '100-499' ? 'active' : '' }}">
                                        <a href="{{ route('shop', array_merge(request()->query(), ['price' => '100-499'])) }}">৳100.00 - ৳499.99</a>
                                    </li>
                                    <li class="{{ request()->get('price') == '500-999' ? 'active' : '' }}">
                                        <a href="{{ route('shop', array_merge(request()->query(), ['price' => '500-999'])) }}">৳500.00 - ৳999.99</a>
                                    </li>
                                    <li class="{{ request()->get('price') == '1000-100000' ? 'active' : '' }}">
                                        <a href="{{ route('shop', array_merge(request()->query(), ['price' => '1000-100000'])) }}">৳1000.00 & above</a>
                                    </li>
                                </ul>
                                
                                <div class="custom-price-filter">
                                    <form action="{{ route('shop') }}" method="GET">
                                        @foreach(request()->except(['price', 'min_p', 'max_p']) as $key => $value)
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                        @endforeach
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <input type="number" name="min_p" placeholder="Min" value="{{ request('min_p') }}">
                                            </div>
                                            <div class="col-6">
                                                <input type="number" name="max_p" placeholder="Max" value="{{ request('max_p') }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn-go">APPLY RANGE</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="left-title mb-20">
                            <h4>Popular Products</h4>
                        </div>
                        <div class="random-area mb-30">
                            <div class="product-active-2 owl-carousel">
                                @foreach($topClickedProducts->chunk(3) as $chunk)
                                <div class="product-total-2">
                                    @foreach($chunk as $p)
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="{{ route('productDetails', $p->slug) }}">
                                                <img src="{{ route('imagecache', ['template' => 'small', 'filename' => $p->fi()]) }}" alt="{{ $p->name_en }}" />
                                            </a>
                                        </div>
                                        <div class="most-product-content">
                                            {{-- <div class="product-rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div> --}}
                                            <h4><a href="{{ route('productDetails', $p->slug) }}">{{ $p->name_en }}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>৳{{ number_format($p->selling_price, 2) }}</li>
                                                    @if($p->discount_price)
                                                        <li class="old-price">৳{{ number_format($p->price, 2) }}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{--<div class="banner-area mb-30">
                            <div class="banner-img-2">
                                <a href="#"><img src="{{ asset('ebook/img/banner/31.jpg') }}" alt="banner" /></a>
                            </div>
                        </div>--}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                    {{--<div class="category-image mb-30">
                        <a href="#"><img src="{{ asset('ebook/img/banner/32.jpg') }}" alt="banner" /></a>
                    </div>--}}
                    <div class="section-title-5 mb-30">
                        <h2>All Books</h2>
                    </div>
                    <div class="toolbar mb-30">
                        <div class="shop-tab">
                            <div class="tab-3">
                                <ul class="nav">
                                    <li><a class="active" href="#th" data-bs-toggle="tab"><i class="fa fa-th-large"></i>Grid</a></li>
                                    {{-- <li><a href="#list" data-bs-toggle="tab"><i class="fa fa-bars"></i>List</a></li> --}}
                                </ul>
                            </div>
                            <div class="list-page">
                                <p>Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                            </div>
                        </div>
                        <form action="{{ route('shop') }}" method="GET" class="d-flex gap-3">
                            <div class="toolbar-sorter">
                                <span>Sort By</span>
                                <select name="sort" class="sorter-options" onchange="this.form.submit()">
                                    <option value="1" @if(request()->get('sort')==1) selected @endif>Latest</option>
                                    <option value="2" @if(request()->get('sort')==2) selected @endif>Oldest</option>
                                    <option value="3" @if(request()->get('sort')==3) selected @endif>Price: High to Low</option>
                                    <option value="4" @if(request()->get('sort')==4) selected @endif>Price: Low to High</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <!-- tab-area-start -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="th">
                            <div class="row">
                                @forelse ($products as $product)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        @include('frontend.home.includes.product_item', ['product' => $product, 'class' => 'mb-40'])
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-5">
                                        <p class="text-muted">No products found.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- tab-area-end -->
                    <!-- pagination-area-start -->
                    <div class="pagination-wrapper mt-40">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                    <!-- pagination-area-end -->
                </div>
            </div>
        </div>
    </div>
    <!-- shop-main-area-end -->
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

    // Add to Cart
    $(document).on("click", ".addToCart", function () {
        let btn = $(this);
        let url = btn.data("url");
        let product_id = btn.data("product");
        let qty = parseInt(btn.closest(".cart-action-wrapper").find(".product_qty").val()) || 1;

        $.post(url, { product: product_id, qty: qty }, function (res) {
            if (res.status) {
                $(`.productCartItem[data-product="${product_id}"]`).html(res.productCartItem);
                $(".cartCount").text(res.cartCount);
                $(".cartItemsCount").text(res.cartItemsCount);
                if(res.cartTotal) {
                    $(".cartTotalPrice").text(parseFloat(res.cartTotal).toFixed(2) + " tk");
                }

                Swal.fire({
                    toast: true, icon: "success", title: res.message,
                    position: "top-end", timer: 2000, showConfirmButton: false
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
