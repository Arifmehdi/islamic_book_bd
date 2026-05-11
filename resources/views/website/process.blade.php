@extends('website.layouts.mncofee')

@section('title', 'Our Mission - '. env('APP_NAME'))

@section('meta')
<meta name="description" content="Discover Islamic Book BD's mission to spread authentic Islamic knowledge across Bangladesh.">
<meta name="keywords" content="Islamic Books, Quran, Hadith, Islamic Knowledge, Islamic Book BD">
@endsection

@push('css')
<style>
    .ad-menu-banner {
        background-image: url("{{ asset('mncofee/assets/img/aida-images/menu-banner.png') }}") !important;
        background-size: cover;
        background-position: center;
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
                <a class="selected-page" href="{{ route('service') }}"> Our Mission</a>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="position-relative py-5" data-aos="fade-up">
    <div class="reservation-page">
        <div class="reservation-page-title-container">
            <img src="{{ asset('mncofee/assets/img/aida-images/service-icon.png') }}" alt="" />
            <h4>{{ $content->title ?? 'Spreading the Light of Islamic Knowledge' }}</h4>
            <p>
                {{ $content->description ?? 'We are dedicated to providing authentic Islamic literature to every doorstep in Bangladesh, fostering a deeper understanding of our deen.' }}
            </p>
        </div>

        <div class="reservation-page-direction-container">
            <div class="reservation-page-single-direction">
                <p>01</p>
                <h6>Authentic Sourcing</h6>
            </div>
            <div class="reservation-page-direction">
                <img src="{{ asset('mncofee/assets/img/aida-images/reservation-page-direction-image1.png') }}" alt="" />
            </div>
            <div class="reservation-page-single-direction reservation-page-single-middle-direction">
                <p>02</p>
                <h6>Quality Check</h6>
            </div>
            <div class="reservation-page-right-direction">
                <img src="{{ asset('mncofee/assets/img/aida-images/reservation-page-direction-image2.png') }}" alt="" />
            </div>
            <div class="reservation-page-single-direction">
                <p>03</p>
                <h6>Swift Delivery</h6>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Steps -->
<section class="py-5" style="background: var(--bg-cream);">
    <div class="container">
        <div class="row align-items-center mb-5" data-aos="fade-right">
            <div class="col-md-6">
                <img src="{{ asset('mncofee/assets/img/aida-images/about-picture1.png') }}" alt="Sourcing" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6 ps-md-5">
                <h3 style="color: var(--primary-color); font-family: 'Oswald', sans-serif;">Step 01: Authentic Book Sourcing</h3>
                <p>We partner with renowned publishers and scholars to bring you only the most authentic and reliable Islamic books. Every book in our collection is carefully selected to ensure it aligns with proper Islamic teachings.</p>
            </div>
        </div>

        <div class="row align-items-center mb-5 flex-md-row-reverse" data-aos="fade-left">
            <div class="col-md-6">
                <img src="{{ asset('mncofee/assets/img/aida-images/service-image1.png') }}" alt="Processing" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6 pe-md-5">
                <h3 style="color: var(--primary-color); font-family: 'Oswald', sans-serif;">Step 02: Meticulous Quality Check</h3>
                <p>Before any book reaches you, it undergoes a thorough quality check. We ensure the printing quality, binding, and content are up to the highest standards, providing you with a premium reading experience.</p>
            </div>
        </div>

        <div class="row align-items-center" data-aos="fade-right">
            <div class="col-md-6">
                <img src="{{ asset('mncofee/assets/img/aida-images/about-picture3.png') }}" alt="Roasting" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6 ps-md-5">
                <h3 style="color: var(--primary-color); font-family: 'Oswald', sans-serif;">Step 03: Safe & Swift Delivery</h3>
                <p>Our dedicated logistics team ensures that your books are packed with care and delivered to your doorstep swiftly. We cover every corner of Bangladesh, making Islamic knowledge accessible to all.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-center" data-aos="zoom-in">
    <div class="container">
        <h2 style="font-family: 'Oswald', sans-serif;">Ready to embark on a journey of knowledge?</h2>
        <p class="mb-4">Explore our vast collection of authentic Islamic books today.</p>
        <a href="{{ route('shop') }}" class="btn" style="background: var(--primary-color); color: white; padding: 12px 30px; border-radius: 50px;">Browse All Books</a>
    </div>
</section>
@endsection
