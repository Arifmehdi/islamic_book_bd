@extends('website.layouts.mncofee')

@section('title', 'Contact Us - '. ($ws->name ?? env('APP_NAME')))

@section('meta')
<meta name="description" content="Get in touch with {{ $ws->name ?? env('APP_NAME') }}. We are here to help you with your inquiries.">
<meta name="keywords" content="Contact, Islamic Book, Help, Inquiries">
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
                            <li><a href="#" class="active">contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->

    <!-- googleMap-area-start -->
    <div class="map-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <iframe
                        src="{{ $ws->iframe_map ?? 'https://maps.google.com/maps?q=dhaka&t=&z=13&ie=UTF8&iwloc=&output=embed' }}"
                        frameborder="0"
                        scrolling="no"
                        style="width: 100%; height: 450px; border:0;"
                        allowfullscreen=""
                        loading="lazy"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- googleMap-end -->

    <!-- contact-area-start -->
    <div class="contact-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="contact-info">
                        <h3>Contact info</h3>
                        <ul>
                            <li>
                                <i class="fas fa-location-dot"></i>
                                <span>Address: </span>
                                {{ $ws->contact_address ?? 'Your address goes here.' }}
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>Email: </span>
                                <a href="mailto:{{ $ws->contact_email ?? 'demo@example.com' }}">{{ $ws->contact_email ?? 'demo@example.com' }}</a>
                            </li>
                            <li>
                                <i class="fas fa-mobile-screen-button"></i>
                                <span>Phone: </span>
                                {{ $ws->contact_mobile ?? '(800) 0123 4567 890' }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="contact-form">
                        <h3><i class="far fa-envelope"></i>Leave a Message</h3>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-form-3">
                                        <input name="name" type="text" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-form-3">
                                        <input name="email" type="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single-form-3">
                                        <input name="subject" type="text" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                     <div class="single-form-3">
                                        <textarea name="message" placeholder="Message" required></textarea>
                                        <button class="submit" type="submit">SEND MESSAGE</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>	
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area-end -->
@endsection
