@extends('layouts.app')
@section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        @foreach ($random as $item)
                            <div class="single_banner_slider">
                                <div class="row">
                                    <div class="col-lg-5 col-md-8">
                                        <div class="banner_text">
                                            <div class="banner_text_iner">
                                                <h1>Wood & Cloth {{ $item->categoris->name }}</h1>
                                                <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                    suspendisse ultrices gravida. Risus commodo viverra</p>
                                                <a href="#" class="btn_2">buy now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner_img d-none d-lg-block">
                                        <img src="storage/{{ $item->src }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                @foreach ($product as $item)
                    <div class="{{ $loop->iteration % 2 == 1 ? 'col-lg-7 col-sm-6' : 'col-lg-5 col-sm-6' }}">
                        <div class="single_feature_post_text">
                            <p>{{ $item->name }}</p>
                            <h3>Latest from {{ $item->categoris->name }}</h3>
                            <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                            <img src="storage/{{ $item->src }}" alt="" style="height: 30vh">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>awesome <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <?php $count = 0; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        @for ($i = 0; $i < $awesome->count(); $i += 8)
                            <div class="single_product_list_slider">
                                <div class="row align-items-center justify-content-between">
                                    @for ($e = 0; $e < 8 && $count < $awesome->count(); $e++)
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single_product_item">
                                                <img src="storage/{{ $awesome[$count]->src }}" alt=""
                                                    style="height: 30vh">
                                                <div class="single_product_text">
                                                    <h4>{{ $awesome[$count]->name }}</h4>
                                                    <h3>{{ $awesome[$count]->prix }}€</h3>
                                                    <a href="#" class="add_cart">+ add to cart<i
                                                            class="ti-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $count++; ?>
                                    @endfor
                                    <?php $e = 0; ?>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- awesome_shop start-->
    <section class="our_offer section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    @foreach ($solde as $item)
                        <div class="offer_img">
                            <img src="storage/{{ $item->src }}" alt="" style="height: 45vh">
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2>Weekly Sale on
                            60% Off All Products</h2>
                        <div class="date_countdown">
                            <div id="timer">
                                <div id="days" class="date"></div>
                                <div id="hours" class="date"></div>
                                <div id="minutes" class="date"></div>
                                <div id="seconds" class="date"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="enter email address"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">book now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- awesome_shop part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
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
                                <img src="storage/{{ $item->src }}" alt="">
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

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Join Our Newsletter</h5>
                        <h2>Subscribe to get Updated
                            with new offers</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="enter email address"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->
@endsection
