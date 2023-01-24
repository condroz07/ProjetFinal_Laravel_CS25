@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Blog</h2>
                            <p>Home <span>-</span> Blog</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    @include('partials.flash')
    <!--================Blog Area =================-->
    <section class="blog_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($blog as $item)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ asset('storage/' . $item->src) }}"
                                        alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ $item->created_at->day }}</h3>
                                        <p>{{  date('M', strtotime($item->created_at))  }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="/showBlog/{{ $item->id }}">
                                        <h2>{{ $item->name }}</h2>
                                    </a>
                                    <p>{{ substr($item->text, 0 , 263) . '...'}}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i>{{ DB::table('cblogs')->where('blogs_id', $item->id)->count() }} Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach

                        @if (request()->routeIs('blog-index'))
                            {{ $blog->links('pagination::blog ') }}
                        @else
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="/blog/search">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            name="search" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'" name="search">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="/blog">All Blog</a>
                                </li>
                                @foreach ($blogcateg as $item)
                                    <li>
                                        <a
                                            href={{ $request->fullUrlWithQuery(['categoris' => $item->id]) }}>{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($recent as $item)
                                <div class="media post_item">
                                    <img src="{{ asset('storage/' . $item->src) }}" alt="post" style="height: 5vh">
                                    <div class="media-body">
                                        <a href="single-blog.html">
                                            <h3>{{ $item->name }}</h3>
                                        </a>
                                        <p>{{ $item->created_at->toFormattedDateString('j F Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="/blog">All Tag</a>
                                </li>
                                @foreach ($tag as $item)
                                    <li>
                                        <a href={{ $request->fullUrlWithQuery(['tag' => $item->id]) }}>{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="{{ route('sub') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
