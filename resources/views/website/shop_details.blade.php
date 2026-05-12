@extends('website.layouts.mncofee')

@section('title', $product->name_en . ' - ' . ($ws->name ?? env('APP_NAME')))

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
    .product-info-main .page-title h1 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .product-info-price .price-final span {
        font-size: 24px;
        color: #5B1E5D;
        font-weight: 700;
    }
    .product-info-price .price-final span.old-price {
        font-size: 18px;
        color: #999;
        text-decoration: line-through;
        margin-left: 10px;
        font-weight: 400;
    }
    .quality-button input {
        width: 60px;
        height: 40px;
        border: 1px solid #e1e1e1;
        text-align: center;
        margin-right: 10px;
    }
    .product-add-form a {
        background: #333;
        color: #fff;
        padding: 10px 30px;
        display: inline-block;
        text-transform: uppercase;
        font-weight: 700;
        transition: 0.3s;
    }
    .product-add-form a:hover {
        background: #5B1E5D;
        color: #fff;
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
                            <li><a href="#" class="active">product details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->

    <!-- product-main-area-start -->
    <div class="product-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-12 order-lg-1 order-1">
                    <!-- product-main-area-start -->
                    <div class="product-main-area">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-12">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li data-thumb="{{ route('imagecache', ['template' => 'large', 'filename' => $product->fi()]) }}">
                                          <img src="{{ route('imagecache', ['template' => 'large', 'filename' => $product->fi()]) }}" alt="{{ $product->name_en }}" />
                                        </li>
                                        @foreach($product->media as $media)
                                        <li data-thumb="{{ route('imagecache', ['template' => 'large', 'filename' => $media->file_name]) }}">
                                          <img src="{{ route('imagecache', ['template' => 'large', 'filename' => $media->file_name]) }}" alt="{{ $product->name_en }}" />
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="product-info-main">
                                    <div class="page-title">
                                        <h1>{{ $product->name_en }}</h1>
                                    </div>
                                    <div class="product-info-stock-sku">
                                        <span>{{ $product->active ? 'In stock' : 'Out of stock' }}</span>
                                        @if($product->sku)
                                        <div class="product-attribute">
                                            <span>SKU</span>
                                            <span class="value">{{ $product->sku }}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-reviews-summary">
                                        <div class="rating-summary">
                                            @php $avgRating = $product->averageRating(); @endphp
                                            @for($i = 1; $i <= 5; $i++)
                                                <a href="#"><i class="{{ $i <= $avgRating ? 'fa' : 'fa-regular' }} fa-star"></i></a>
                                            @endfor
                                        </div>
                                        <div class="reviews-actions">
                                            <a href="#">{{ $product->reviews->count() }} Reviews</a>
                                            <a href="#Reviews" class="view">Add Your Review</a>
                                        </div>
                                    </div>
                                    <div class="product-info-price">
                                        <div class="price-final">
                                            <span>৳{{ number_format($product->selling_price, 2) }}</span>
                                            @if($product->discount_price)
                                                <span class="old-price">৳{{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-add-form">
                                        <form action="#">
                                            <div class="quality-button">
                                                <input class="qty" type="number" value="1" id="mainQty">
                                            </div>
                                            <a href="javascript:void(0)" class="addToCartDetail" data-url="{{ route('addToCart') }}" data-product="{{ $product->id }}">Add to cart</a>
                                        </form>
                                    </div>
                                    <div class="product-social-links">
                                        <div class="product-addto-links">
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-pie-chart"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                                        </div>
                                        <div class="product-addto-links-text">
                                            <p>{{ Str::limit(strip_tags($product->description_en), 250) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	
                    </div>
                    <!-- product-main-area-end -->
                    <!-- product-info-area-start -->
                    <div class="product-info-area mt-80">
                        <!-- Nav tabs -->
                        <ul class="nav">
                            <li><a class="active" href="#Details" data-bs-toggle="tab">Details</a></li>
                            <li><a href="#Reviews" data-bs-toggle="tab">Reviews {{ $product->reviews->count() }}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Details">
                                <div class="valu">
                                  {!! $product->description_en !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Reviews">
                                <div class="valu valu-2">
                                    <div class="section-title mb-60 mt-60">
                                        <h2>Customer Reviews</h2>
                                    </div>
                                    <ul>
                                        @foreach($product->reviews as $review)
                                        <li>
                                            <div class="review-title">
                                                <h3>{{ $review->user->name ?? 'Anonymous' }}</h3>
                                            </div>
                                            <div class="review-left">
                                                <div class="review-rating">
                                                    <span>Rating</span>
                                                    <div class="rating-result">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <a href="#"><i class="{{ $i <= $review->rating ? 'fa' : 'fa-regular' }} fa-star"></i></a>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-right">
                                                <div class="review-content">
                                                    <h4>{{ $review->comment }}</h4>
                                                </div>
                                                <div class="review-details">
                                                    <p class="review-author">Review by<a href="#"> {{ $review->user->name ?? 'Anonymous' }}</a></p>
                                                    <p class="review-date">Posted on <span>{{ $review->created_at->format('M d, Y') }}</span></p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="review-add">
                                        <h3>You're reviewing:</h3>
                                        <h4>{{ $product->name_en }}</h4>
                                    </div>
                                    
                                    <form action="{{ route('reviewsStore') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="review-field-ratings">
                                            <span>Your Rating <sup>*</sup></span>
                                            <div class="control">
                                                <div class="single-control">
                                                    <select name="rating" class="form-control" style="width: 150px;">
                                                        <option value="5">5 Stars</option>
                                                        <option value="4">4 Stars</option>
                                                        <option value="3">3 Stars</option>
                                                        <option value="2">2 Stars</option>
                                                        <option value="1">1 Star</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-form-button mt-30">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="single-form">
                                                        <label>Review <sup>*</sup></label>
                                                        <textarea name="comment" cols="10" rows="10" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="buttons-set">
                                                <button type="submit" class="btn btn-primary-custom" style="background:#333; color:#fff; padding:10px 30px; border:none; font-weight:bold;">Submit Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>	
                    </div>
                    <!-- product-info-area-end -->
                    <!-- new-book-area-start -->
                    @if($relatedProducts->count() > 0)
                    <div class="new-book-area mt-60">
                        <div class="section-title text-center mb-40">
                            <h2>Related Products</h2>
                        </div>
                        <div class="tab-active-2 owl-carousel">
                            @foreach($relatedProducts as $related)
                                @include('frontend.home.includes.product_item', ['product' => $related])
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!-- new-book-area-end -->
                </div>
                <div class="col-lg-3 col-md-12 col-12 order-lg-2 order-2">
                    <div class="shop-left-sidebar">
                        <div class="single-shop mb-40">
                            <div class="left-title-2">
                                <h2>Categories</h2>
                            </div>
                            <div class="shop-menu">
                                <ul>
                                    @foreach($productCategories->take(10) as $rootCat)
                                        <li><a href="{{ route('productCategory', $rootCat->slug) }}">{{ $rootCat->name_en }}</a></li>
                                    @endforeach                                </ul>
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
            </div>
        </div>
    </div>
    <!-- product-main-area-end -->
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Add to Cart from Detail Page
        $(document).on("click", ".addToCartDetail", function () {
            let btn = $(this);
            let url = btn.data("url");
            let product_id = btn.data("product");
            let qty = parseInt($('#mainQty').val()) || 1;

            $.post(url, { product: product_id, qty: qty, _token: "{{ csrf_token() }}" }, function (res) {
                if (res.status) {
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

        // Owl carousel for related products
        $(".tab-active-2").owlCarousel({
            autoPlay: false, 
            slideSpeed:2000,
            pagination:false,
            navigation:true,	  
            items : 4,
            /* transitionStyle : "fade", */    /* [ThisChild option for transitionStyle: "fade","backSlide","goDown","fadeUp"] */
            navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [991,2],
            itemsTablet: [767,1],
            itemsMobile : [479,1],
        });
    });
</script>
@endpush
