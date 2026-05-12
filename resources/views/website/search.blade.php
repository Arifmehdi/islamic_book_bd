@extends('website.layouts.mncofee')

@section('title', 'Search Results for "' . $parameter . '" - ' . ($ws->name ?? env('APP_NAME')))

@section('meta')
<meta name="description" content="Search results for {{ $parameter }} at {{ $ws->name ?? env('APP_NAME') }}.">
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
                            <li><a href="#" class="active">Search results</a></li>
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
                                    @foreach ($productCategories as $category)
                                        <li><a href="{{ route('productCategory', $category->slug) }}">{{ $category->name_en }}</a></li>
                                    @endforeach
                                </ul>
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
                                            <h4><a href="{{ route('productDetails', $p->slug) }}">{{ $p->name_en }}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>৳{{ number_format($p->selling_price, 2) }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                    <div class="section-title-5 mb-30">
                        <h2>Search results for: "{{ $parameter }}"</h2>
                        <p class="text-muted">Found {{ $products->total() }} results</p>
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
                                        <i class="fas fa-search fa-4x mb-4 text-muted"></i>
                                        <h3>No products found for "{{ $parameter }}"</h3>
                                        <p class="text-muted">Try searching with different keywords.</p>
                                        <a href="{{ route('shop') }}" class="btn btn-primary-custom mt-3" style="background-color: #5B1E5D; color:#fff; padding:10px 30px; border-radius:50px; text-decoration:none;">Browse All Books</a>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- tab-area-end -->
                    
                    <!-- pagination-area-start -->
                    @if($products->hasPages())
                    <div class="pagination-wrapper mt-40">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                    @endif
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
});
</script>
@endpush
