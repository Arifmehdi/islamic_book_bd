@extends('website.layouts.mncofee')

@section('title', 'About Us - '. ($ws->name ?? env('APP_NAME')))

@section('meta')
<meta name="description" content="{{ $ws->meta_description ?? 'Learn more about ' . ($ws->name ?? env('APP_NAME')) . '.' }}">
<meta name="keywords" content="About Us, Islamic Books, Mission, Vision">
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
    .counter-area {
        background: #5B1E5D;
        color: #fff;
    }
    .single-counter h2 {
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
                            <li><a href="#" class="active">about</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->

    <!-- about-main-area-start -->
    <div class="about-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="about-img">
                        <a href="#"><img src="{{ asset('ebook/img/banner/32.jpg') }}" alt="about" /></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="about-content">
                        <h3>{{ $content->subtitle ?? 'Why' }}<span>{{ $content->title ?? 'We are?' }}</span></h3>
                        <p>{{ $content->description ?? 'Islamic Book BD is committed to making authentic Islamic knowledge accessible to everyone in Bangladesh. We curate a vast collection of Quran, Hadith, and scholarly works from trusted publishers.' }}</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-check"></i>Authentic Islamic literature</a></li>
                            <li><a href="#"><i class="fa fa-check"></i>Trusted by scholars and readers</a></li>
                            <li><a href="#"><i class="fa fa-check"></i>Wide range of categories</a></li>
                            <li><a href="#"><i class="fa fa-check"></i>Fast and reliable delivery</a></li>
                            <li><a href="#"><i class="fa fa-check"></i>Secure online shopping</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-main-area-end -->

    <!-- our-mission-area-start -->
    <div class="our-mission-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-misson">
                        <h3>Our<span>Goal</span></h3>
                        <p>To provide authentic Islamic literature that nurtures the soul and fosters a deeper understanding of Islamic teachings within the community.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-misson">
                        <h3>Our<span>Mission</span></h3>
                        <p>To make authentic Islamic knowledge accessible to every household in Bangladesh through a reliable and user-friendly platform.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-misson mrg-none-xs">
                        <h3>Our<span>Vision</span></h3>
                        <p>To become the most trusted and comprehensive online destination for Islamic books and spiritual resources in Bangladesh.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our-mission-area-end -->

    <!-- counter-area-start -->
    <div class="counter-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-counter mb-30 text-center">
                        <h2 class="counter">5000</h2>
                        <span>Books Available</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-counter mb-30 text-center">
                        <h2 class="counter">12000</h2>
                        <span>Happy Readers</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-counter mb-30 text-center">
                        <h2 class="counter">500</h2>
                        <span>Authors</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-counter mb-30 text-center">
                        <h2 class="counter">64</h2>
                        <span>Districts Covered</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter-area-end -->

    <!-- team-area-start -->
    {{--<div class="team-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title text-center mb-50">
                        <h2>Our Core Team</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-team mb-30">
                        <div class="team-img-area">
                            <div class="team-img">
                                <a href="#"><img src="{{ asset('ebook/img/team/1.jpg') }}" alt="team" /></a>
                            </div>
                            <div class="team-link">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h3>Marcos Alonso</h3>
                            <span>Class Master</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-team mb-30">
                        <div class="team-img-area">
                            <div class="team-img">
                                <a href="#"><img src="{{ asset('ebook/img/team/2.jpg') }}" alt="team" /></a>
                            </div>
                            <div class="team-link">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h3>Luis Aragones</h3>
                            <span>Marketer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-team mb-30">
                        <div class="team-img-area">
                            <div class="team-img">
                                <a href="#"><img src="{{ asset('ebook/img/team/3.jpg') }}" alt="team" /></a>
                            </div>
                            <div class="team-link">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h3>Maria Alessis</h3>
                            <span>Class Master</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-team mb-30">
                        <div class="team-img-area">
                            <div class="team-img">
                                <a href="#"><img src="{{ asset('ebook/img/team/4.jpg') }}" alt="team" /></a>
                            </div>
                            <div class="team-link">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h3>John Doe</h3>
                            <span>PHP Developer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- team-area-end -->
@endsection
