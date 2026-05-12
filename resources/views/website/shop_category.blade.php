@extends('website.layouts.mncofee')

@section('title', (isset($category) ? $category->name_en : 'Shop') . ' - ' . ($ws->name ?? env('APP_NAME')))

@section('meta')
<meta name="description" content="Browse {{ isset($category) ? $category->name_en : 'books' }} in our Islamic book store.">
<meta name="keywords" content="{{ isset($category) ? $category->name_en : 'Islamic Books' }}, Shop, Quran, Hadith">
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
    .single-most-product bd mb-18 {
        border-bottom: 1px solid #eee;
        padding-bottom: 18px;
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
                            <li><a href="{{ route('shop') }}">shop</a></li>
                            @if(isset($category))
                                <li><a href="#" class="active">{{ $category->name_en }}</a></li>
                            @endif
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
                        <div class="single-shop mb-40">
                            <div class="left-title-2">
                                <h2>Categories</h2>
                            </div>
                            <div class="shop-menu">
                                <ul>
                                    @foreach ($allRootCategories as $rootCat)
                                        <li class="{{ isset($category) && ($category->id == $rootCat->id || $category->parent_id == $rootCat->id) ? 'active' : '' }}">
                                            <a href="{{ route('productCategory', $rootCat->slug) }}">{{ $rootCat->name_en }}</a>
                                            @if($rootCat->children->count() > 0)
                                                <ul class="ms-3">
                                                    @foreach($rootCat->children as $child)
                                                        <li><a href="{{ route('productCategory', $child->slug) }}" style="{{ isset($category) && $category->id == $child->id ? 'color:#5B1E5D; font-weight:bold;' : '' }}">- {{ $child->name_en }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="left-title mb-20">
                            <h4>Price</h4>
                        </div>
                        <div class="left-menu mb-30">
                            <ul>
                                <li><a href="{{ url()->current() }}?min_price=0&max_price=99">৳0.00-৳99.99</a></li>
                                <li><a href="{{ url()->current() }}?min_price=100&max_price=499">৳100.00-৳499.99</a></li>
                                <li><a href="{{ url()->current() }}?min_price=500&max_price=999">৳500.00-৳999.99</a></li>
                                <li><a href="{{ url()->current() }}?min_price=1000">৳1000.00-and above</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                    <div class="category-image mb-30">
                        <a href="#"><img src="{{ asset('ebook/img/banner/32.jpg') }}" alt="banner" /></a>
                    </div>
                    <div class="section-title-5 mb-30">
                        <h2>{{ isset($category) ? $category->name_en : 'Products' }}</h2>
                    </div>
                    <div class="toolbar mb-30">
                        <div class="shop-tab">
                            <div class="tab-3">
                                <ul class="nav">
                                    <li><a class="active" href="#th" data-bs-toggle="tab"><i class="fa fa-th-large"></i>Grid</a></li>
                                </ul>
                            </div>
                            <div class="list-page">
                                <p>Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                            </div>
                        </div>
                        <form action="{{ url()->current() }}" method="GET" class="d-flex gap-3">
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
                                        <p class="text-muted">No products found in this category.</p>
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
