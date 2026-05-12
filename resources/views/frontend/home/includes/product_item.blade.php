<div class="product-wrapper {{ $class ?? '' }}">
    <div class="product-img">
        <a href="{{ route('productDetails', $product->slug) }}">
            <img src="{{ route('imagecache', ['template' => 'large', 'filename' => $product->fi()]) }}" alt="{{ $product->name_en }}" class="primary" />
        </a>
        <div class="quick-view">
            <a class="action-view" href="javascript:void(0)" 
               data-bs-target="#productModal" 
               data-bs-toggle="modal" 
               data-id="{{ $product->id }}"
               data-url="{{ route('quick.view') }}"
               title="Quick View">
                <i class="fa fa-search-plus"></i>
            </a>
        </div>
        <div class="product-flag">
            <ul>
                @if($product->feature)
                    <li><span class="sale">featured</span></li>
                @endif
                @if($product->discount_price && $product->price > 0)
                    <li><span class="discount-percentage">-{{ round((($product->price - $product->selling_price) / $product->price) * 100) }}%</span></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="product-details text-center">
        {{-- <div class="product-rating">
            <ul>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
            </ul>
        </div> --}}
        <h4><a href="{{ route('productDetails', $product->slug) }}">{{ $product->name_en }}</a></h4>
        <div class="product-price">
            <ul>
                <li>৳{{ number_format($product->selling_price, 2) }}</li>
                {{--@if($product->discount_price)
                    <li class="old-price">৳{{ number_format($product->price, 2) }}</li>
                @endif--}}
            </ul>
        </div>
    </div>
    <div class="product-link">
        <div class="product-button productCartItem" data-product="{{ $product->id }}">
            @include('frontend.home.includes.productCartItem')
        </div>
        <div class="add-to-link">
            <ul>
                <li><a href="{{ route('productDetails', $product->slug) }}" title="Details"><i class="fa fa-external-link"></i></a></li>
            </ul>
        </div>
    </div>
</div>
