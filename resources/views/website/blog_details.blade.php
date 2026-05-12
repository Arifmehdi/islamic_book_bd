@extends('website.layouts.mncofee')

@section('title', $news->title . ' - '. ($ws->name ?? env('APP_NAME')))

@section('meta')
<meta name="description" content="{{ Str::limit(strip_tags($news->description), 160) }}">
<meta name="keywords" content="{{ $news->meta_keywords ?? 'Blog, Islamic Books, News' }}">
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
    .blog-single-content img {
        max-width: 100%;
        height: auto;
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
                            <li><a href="{{ route('news') }}">blog</a></li>
                            <li><a href="#" class="active">blog details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->

    <!-- blog-main-area-start -->
    <div class="blog-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2">
                    <div class="blog-left-sidebar mrg-sm-blog">
                        <div class="single-blog mb-50">
                            <div class="blog-left-title">
                                <h3>Search</h3>
                            </div>
                            <div class="side-form">
                                <form action="{{ route('search') }}" method="GET">
                                    <input type="text" name="parameter" placeholder="Search..." />
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="single-blog mb-50">
                            <div class="blog-left-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="blog-side-menu">
                                <ul>
                                    @foreach($newsCategories as $cat)
                                        <li><a href="{{ route('categoryPosts', $cat->id) }}">{{ $cat->name }} ({{ $cat->posts_count }})</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="single-blog mb-50">
                            <div class="blog-left-title">
                                <h3>Recent Posts</h3>
                            </div>
                            <div class="blog-side-menu">
                                <ul>
                                    @foreach($latestPosts as $recent)
                                        <li><a href="{{ route('singleNews', $recent->id) }}">{{ $recent->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                    <div class="blog-main-wrapper">
                        <div class="author-destils mb-30">
                            <div class="author-left">
                                <div class="author-img">
                                    <a href="#"><img src="{{ asset('ebook/img/author/1.jpg') }}" alt="author" /></a>
                                </div>
                                <div class="author-description">
                                    <p>Posted by:
                                        <a href="#"><span>{{ $news->author->name ?? 'Admin' }}</span></a>
                                        in <a href="#">{{ $news->category->name ?? 'Uncategorized' }}</a>
                                    </p>
                                    <span>{{ $news->created_at->format('M d Y') }}</span>
                                </div>
                            </div>
                            <div class="author-right">
                                <span>Share this:</span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-img mb-30 text-center">
                            <img src="{{ route('imagecache', ['template' => 'large', 'filename' => $news->fi()]) }}" alt="{{ $news->title }}" />
                        </div>
                        <div class="single-blog-content">
                            <div class="single-blog-title">
                                <h3>{{ $news->title }}</h3>
                            </div>
                            <div class="blog-single-content">
                                {!! $news->description !!}
                            </div>
                        </div>
                        {{-- Related Posts --}}
                        @if($relatedPosts->count() > 0)
                        <div class="related-post mt-50">
                            <div class="single-blog-title">
                                <h3>Related Posts</h3>
                            </div>
                            <div class="row">
                                @foreach($relatedProducts ?? [] as $related)
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="single-related-post">
                                        <div class="related-img">
                                            <a href="{{ route('singleNews', $related->id) }}">
                                                <img src="{{ route('imagecache', ['template' => 'medium', 'filename' => $related->fi()]) }}" alt="{{ $related->title }}" />
                                            </a>
                                        </div>
                                        <div class="related-content">
                                            <h4><a href="{{ route('singleNews', $related->id) }}">{{ $related->title }}</a></h4>
                                            <span>{{ $related->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <div class="sharing-post mt-20">
                            <div class="share-text">
                                <span>Share this post</span>
                            </div>
                            <div class="share-icon">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-main-area-end -->
@endsection
