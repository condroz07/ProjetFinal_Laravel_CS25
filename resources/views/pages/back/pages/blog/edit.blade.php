@extends('layouts.dash')
@section('content')
    <section class="blog_area single-post-area padding_top">
        <div class="container">
            <div class="row">
                @include('partials.flash')
                <form action="/updateBlog/{{ $blog->id }}" method="POST" class="col-lg-8 posts-list">
                    @csrf
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('storage/' . $blog->src) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <input name="name" type="text" value="{{ $blog->name }}">
                            <ul class="blog-info-link mt-3 mb-4">
                                <li>
                                    <a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a>
                                </li>
                                <li>
                                    <a href="a#"><i class="far fa-comments"></i> {{ $comment2 }} Comments</a>
                                </li>
                            </ul>
                            <p class="excert">
                                <textarea name="text" id="" cols="50" rows="16">
                                    {{ $blog->text }}
                                </textarea>
                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    <textarea name="text2" id="" cols="50" rows="10">
                                        {{ $blog->text2 }}
                                    </textarea>
                                </div>
                            </div>
                            <p>
                                <textarea name="text3" id="" cols="50" rows="16">
                                    {{ $blog->text3 }}
                                </textarea>
                            </p>
                        </div>
                    </div>
                    <button class="btn_3" type="submit">Edit</button>
                </div>
            </form>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
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
    <!--================Blog Area end =================-->
@endsection
