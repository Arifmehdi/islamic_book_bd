@extends('website.layouts.mncofee')

@section('title', 'Blog - '. ($ws->name ?? env('APP_NAME')))

@section('meta')
<meta name="description" content="Stay updated with the latest news and articles from {{ $ws->name ?? env('APP_NAME') }}.">
<meta name="keywords" content="Blog, Islamic Books, News, Articles">
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
                            <li><a href="#" class="active">blog</a></li>
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
                        {{-- <div class="single-blog mb-50">
                            <div class="blog-left-title">
                                <h3>Recent Posts</h3>
                            </div>
                            <div class="blog-side-menu">
                                <ul>
                                    @foreach(App\Models\BlogPost::whereActive(true)->whereStatus('published')->latest()->take(5)->get() as $recent)
                                        <li><a href="{{ route('singleNews', $recent->id) }}">{{ $recent->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
                        <div class="single-blog mb-50">
                            <div class="blog-left-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="catagory-menu" id="cate-toggle">
                                <ul>
                                    @foreach(App\Models\BlogCategory::withCount('posts')->get() as $cat)
                                        <li><a href="{{ route('categoryPosts', $cat->id) }}">{{ $cat->name }} ({{ $cat->posts_count }})</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                    <div class="blog-main-wrapper">
                        @forelse($news as $post)
                        <div class="single-blog-post mb-40">
                            <div class="author-destils mb-30">
                                <div class="author-left">
                                    <div class="author-img">
                                        <a href="#"><img src="{{ asset('ebook/img/author/1.jpg') }}" alt="author" /></a>
                                    </div>
                                    <div class="author-description">
                                        <p>Posted by: 
                                            <a href="#"><span>{{ $post->author->name ?? 'Admin' }}</span></a>
                                            in <a href="#">{{ $post->category->name ?? 'Uncategorized' }}</a>
                                        </p>
                                        <span>{{ $post->created_at->format('M d Y') }}</span>
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
                            <div class="blog-img mb-30">
                                <a href="{{ route('singleNews', $post->id) }}">
                                    <img src="{{ route('imagecache', ['template' => 'large', 'filename' => $post->fi()]) }}" alt="{{ $post->title }}" />
                                </a>
                            </div>
                            <div class="single-blog-content">
                                <div class="single-blog-title">
                                    <h3><a href="{{ route('singleNews', $post->id) }}">{{ $post->title }}</a></h3>
                                </div>
                                <div class="blog-single-content">
                                    <p>{{ Str::limit(strip_tags($post->description), 250) }}</p>
                                </div>
                            </div>
                            <div class="blog-comment-readmore">
                                <div class="blog-readmore">
                                    <a href="{{ route('singleNews', $post->id) }}">Read more<i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                                <div class="blog-com">
                                    <a href="#">{{ $post->view_count }} views</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p>No blog posts found.</p>
                        @endforelse

                        <div class="pagination-wrapper mt-40">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-main-area-end -->
@endsection
