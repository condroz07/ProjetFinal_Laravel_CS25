@extends('layouts.app')
@section('content')
    <section class="blog_area single-post-area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('img/blog/' . $blog->src) }}   " alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $blog->name }}
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="a#"><i class="far fa-comments"></i> {{ $comment2 }} Comments</a></li>
                            </ul>
                            <p class="excert">
                                {{ $blog->text }}
                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand
                                    why you
                                    should have to spend money on boot camp when you can get the MCSE study materials
                                    yourself at
                                    a fraction of the camp price. However, who has the willpower to actually sit through a
                                    self-imposed MCSE training.
                                </div>
                            </div>
                            <p>
                                {{ $blog->text }}
                            </p>
                        </div>
                    </div>
                    <div class="comments-area">
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    @foreach ($comment as $item)
                                        @if ($item->blogs_id == $blog->id)
                                            <div class="thumb">
                                                <img src="img/comment/comment_1.png" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    {{ $item->comment }}
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#">{{ $item->name }}</a>
                                                        </h5>
                                                        <p class="date">{{ $item->created_at->toFormattedDateString('j F Y') }}</p>
                                                    </div>
                                                </div>
                                        @else
                                        @endif
                                    @endforeach
                                    <div>
                                        {{ $comment->links('pagination::perso ') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form class="form-contact comment_form" action="{{ route('comment.blog') }}" method="POST">
                        @csrf
                        <input type="text" class="d-none" value="{{ $blog->id }}" name="blogs_id">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" cols="30" rows="9"
                                        placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn_3 button-contactForm">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        @foreach ($recent as $item)
                            <div class="media post_item">
                                <img src="{{ asset('img/blog/' . $item->src) }}" alt="post" style="height: 5vh">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{ $item->name }}</h3>
                                    </a>
                                    <p>{{ $item->created_at->toFormattedDateString('j F Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>
                    @include('partials.flash')
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
