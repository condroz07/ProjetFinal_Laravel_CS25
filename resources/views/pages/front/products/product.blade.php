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
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    @include('partials.flash')
    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Product filters</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="/product">All Products</a>
                                    </li>
                                    @foreach ($categoris as $item)
                                        <li>
                                            <a
                                                href={{ $request->fullUrlWithQuery(['categoris' => $item->id]) }}>{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Color Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="/product">All Products</a>
                                    </li>
                                    @foreach ($color as $item)
                                        <li>
                                            <a
                                                href={{ $request->fullUrlWithQuery(['couleur' => $item->id]) }}>{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu d-flex">
                                    <form class="input-group" action="/product/search" method="GET">
                                        @csrf
                                        <input type="text" class="form-control" name="search" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span type="submit" class="input-group-text" id="inputGroupPrepend"><i
                                                    class="ti-search"></i></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">

                        @foreach ($products as $item)
                            @if ($item->quantite > 0)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="{{ asset('storage/' . $item->src) }}" alt=""
                                            style="height: 35svh">
                                        <div class="single_product_text">
                                            <form action="{{ route('panier.ajouter') }}" method="POST">
                                                @csrf
                                                <input type="text" class="d-none" name="products_id"
                                                    value="{{ $item->id }}">
                                                <h4>{{ $item->name }}</h4>
                                                <h3>{{ $item->prix }}€</h3>
                                                @auth
                                                    <a href="" class="add_cart"><button type="submit" class="btn">+
                                                            add to cart</button></a>
                                                @endauth
                                            </form>
                                            @auth
                                                <form action="{{ route('add.favoris') }}" method="POST">
                                                    @csrf
                                                    <input type="text" class="d-none" name="products_id"
                                                        value="{{ $item->id }}">
                                                    <a><button class="btn" type="submit"><i
                                                                class="ti-heart"></i></button></a>
                                                </form>
                                            @endauth
                                            <a href="/showProduct/{{ $item->id }}">More Détails</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        @if (request()->routeIs('product-index'))
                                            {{ $products->links('pagination::perso ') }}
                                        @else
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
    <section class="product_list best_seller">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Sellers <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach ($bestseller as $item)
                            <div class="single_product_item">
                                <img src="storage/{{ $item->src }}" alt="" style="height: 30vh">
                                <div class="single_product_text">
                                    <h4>{{ $item->name }}</h4>
                                    <h3>{{ $item->prix }}€</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->
@endsection
