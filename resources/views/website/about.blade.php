@extends('website.layouts.mncofee')

@section('title', 'About Us - MN Coffee')

@section('meta')
<meta name="description" content="Learn about MN Coffee, our mission to build a sustainable local coffee industry, and our vision for Bangladesh specialty coffee.">
<meta name="keywords" content="MN Coffee, Mission, Vision, Bangladesh Coffee, Specialty Coffee, Bandarban">
@endsection

@push('css')
<style>
    .ad-menu-banner {
        background-image: url("{{ asset('mncofee/assets/img/aida-images/menu-banner.png') }}") !important;
        background-size: cover;
        background-position: center;
    }
    .mission-vision-card {
        background: #fdfaf7;
        border-left: 5px solid var(--primary-color);
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 0 10px 10px 0;
    }
    .mission-vision-card h4 {
        color: var(--primary-color);
        font-family: 'Oswald', sans-serif;
        margin-bottom: 15px;
    }
</style>
@endpush

@section('content')
<!--------------- 
    Banner 
---------------->
<section>
    <div class="ad-menu-banner position-relative">
        <div class="ad-menu-banner-overlay">
            <div>
                <a href="{{ route('home') }}">Home /</a>
                <a class="selected-page" href="{{ route('about-us') }}"> About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- About Us -->
<section class="ad-about-section ad-about-page-section">
    <div class="container ad-about-container about-page-container">
        <div class="ad-about-image-container position-relative">
            <div class="ad-about-person-image">
                <img src="{{ asset('mncofee/assets/img/aida-images/about-picture1.png') }}" alt="">
            </div>
            <div class="mt-sm-5 ad-about-side-image-container">
                <img class="ad-about-side-tea about-page-cup" src="{{ asset('mncofee/assets/img/aida-images/about-page-cup.png') }}" alt="">
                <img class=" ad-about-bottom-image about-page-bottom-image" src="{{ asset('mncofee/assets/img/aida-images/about-page-image.png') }}" alt="">
            </div>
        </div>
        <div class="ad-about-text-container">
            <h5>{{ $content->subtitle ?? 'Our Story' }}</h5>
            <h4>{!! $content->title ?? 'Spreading Wisdom through <br> Authentic Islamic Books' !!}</h4>
            <p>
                {{ $content->description ?? 'Islamic Book BD is committed to making authentic Islamic knowledge accessible to everyone in Bangladesh. We curate a vast collection of Quran, Hadith, and scholarly works from trusted publishers, ensuring that our readers receive reliable spiritual guidance and high-quality literature.' }}
            </p>
            
            <div class="mt-5">
                @if(isset($content->highlights) && is_array($content->highlights))
                    @foreach($content->highlights as $index => $highlight)
                        <div class="mission-vision-card" data-aos="fade-left" data-aos-delay="{{ $index * 200 }}">
                            <h4>{{ $highlight['title'] ?? '' }}</h4>
                            <p>{{ $highlight['text'] ?? '' }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="mission-vision-card" data-aos="fade-left">
                        <h4>Our Mission</h4>
                        <p>To provide authentic Islamic literature that nurtures the soul and fosters a deeper understanding of Islamic teachings within the community.</p>
                    </div>
                    
                    <div class="mission-vision-card" data-aos="fade-left" data-aos-delay="200">
                        <h4>Our Vision</h4>
                        <p>To become the most trusted and comprehensive online destination for Islamic books and spiritual resources in Bangladesh.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Core Focus -->
@if(isset($content->meta['objectives']) && is_array($content->meta['objectives']))
<section class="py-5" style="background: var(--bg-cream);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h5 style="color: var(--primary-color);">{{ $content->meta['focus_subtitle'] ?? 'Our Focus' }}</h5>
            <h2 style="font-family: 'Oswald', sans-serif;">{{ $content->meta['focus_title'] ?? 'Key Objectives' }}</h2>
        </div>
        <div class="row">
            @foreach($content->meta['objectives'] as $index => $obj)
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="text-center p-4 bg-white shadow-sm rounded">
                    <i class="{{ $obj['icon'] ?? 'fa-light fa-circle' }} fa-3x mb-3" style="color: var(--primary-color);"></i>
                    <h5>{{ $obj['title'] ?? '' }}</h5>
                    <p>{{ $obj['text'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@else
<section class="py-5" style="background: var(--bg-cream);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h5 style="color: var(--primary-color);">Our Focus</h5>
            <h2 style="font-family: 'Oswald', sans-serif;">Key Objectives</h2>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up">
                <div class="text-center p-4 bg-white shadow-sm rounded">
                    <i class="fa-light fa-book-quran fa-3x mb-3" style="color: var(--primary-color);"></i>
                    <h5>Authenticity</h5>
                    <p>Rigorous selection process to ensure every book aligns with authentic Islamic teachings.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center p-4 bg-white shadow-sm rounded">
                    <i class="fa-light fa-truck-fast fa-3x mb-3" style="color: var(--primary-color);"></i>
                    <h5>Accessibility</h5>
                    <p>Fast and reliable delivery service making Islamic books accessible even in the remotest areas.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center p-4 bg-white shadow-sm rounded">
                    <i class="fa-light fa-hands-holding-heart fa-3x mb-3" style="color: var(--primary-color);"></i>
                    <h5>Community Impact</h5>
                    <p>Nurturing a well-informed and spiritually uplifted community through righteous knowledge.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-----------------------
    Customer Review
---------------------->
<section data-aos="fade-up" class="py-5">
    <div class="ad-customer-review">
        <div class="ad-review-title-container">
            <img src="{{ asset('mncofee/assets/img/aida-images/service-icon.png') }}" alt="">
            <h4>What Our Partners Say</h4>
        </div>
        <div class="container position-relative">
            <div class="ad-review-bg-container">
                <div>
                    <img src="{{ asset('mncofee/assets/img/aida-images/about-page-review-bg.png') }}" alt="">
                </div>
                <div class="d-flex gap-3">
                    <i class="fa-solid fa-chevron-left" data-bs-target="#reviewCarousel" data-bs-slide="prev"></i>
                    <i class="fa-solid fa-chevron-right" data-bs-target="#reviewCarousel" data-bs-slide="next"></i>
                </div>
            </div>
            <div>
                <div id="reviewCarousel" class="carousel slide ad-review-carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($testimonials as $key => $testimonial)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ad-single-review">
                            <div class="d-flex gap-2">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <p>{!! $testimonial->text_en !!}</p>
                            <div class="ad-review-person-container">
                                <img src="{{ asset('storage/testimonials/' . ($testimonial->image ?? 'default.png')) }}" alt="{{ $testimonial->name }}" style="width: 60px; height: 60px; border-radius: 50%;">
                                <div>
                                    <h4>{{ $testimonial->name }}</h4>
                                    <span>{{ $testimonial->designation }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
$(document).ready(function() {
    var rCarousel = document.querySelector('#reviewCarousel');
    if (rCarousel) new bootstrap.Carousel(rCarousel, { interval: 5000, ride: 'carousel' });
});
</script>
@endpush
