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
                            <h2>Producta Checkout</h2>
                            <p>Home <span>-</span> Shop Single</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
        <div class="container">
            <form action="/checkout/code" class="cupon_area" method="POST">
                @csrf
                <div class="check_title">
                    <h2>
                        Have a coupon? enter your code
                    </h2>
                </div>
                <input type="text" placeholder="Enter coupon code" name="discount" />
                <button type="submit" class="tp_btn" >Apply Coupon</button>
            </form>
            <form action="{{ route('order-post') }}" method="post" class="billing_details">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <div class="row contact_form">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="firstname" />
                                <span class="placeholder" data-placeholder="First name"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="lastname" />
                                <span class="placeholder" data-placeholder="Last name"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number" />
                                <span class="placeholder" data-placeholder="Phone number"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" />
                                <span class="placeholder" data-placeholder="Email Address"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="adresse" />
                                <span class="placeholder" data-placeholder="Address line 01"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city" />
                                <span class="placeholder" data-placeholder="Town/City"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="postale"
                                    placeholder="Postcode/ZIP" />
                            </div>
                            <input type="text" class="d-none" value="{{ Auth::user()->id }}" name="user_id">
                            <input type="text" class="d-none" value="{{ $order }}" name="order">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                @foreach ($panier as $item)
                                    <input type="text" class="d-none" value="{{ $item->id }}" name="products_id">
                                    <li>
                                        <a href="#">{{ $item->products->name }}
                                            <span class="middle">X{{ $item->quantite }}</span>
                                            <input type="text" name="quantite" value="{{ $item->quantite }}" class="d-none">
                                            <span class="last">{{ $item->products->prix * $item->quantite }} €</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Subtotal
                                        <span>{{ $total }} €</span>
                                    </a>
                                </li>
                                <li>
                                    <a>Shipping
                                        <span>{{ $total * ($code / 100) }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Total
                                        <span>{{ $total }} €</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector" />
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Please send a check to Store Name, Store Street, Store Town,
                                    Store State / County, Store Postcode.
                                </p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector" />
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/single-product/card.jpg" alt="" />
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Please send a check to Store Name, Store Street, Store Town,
                                    Store State / County, Store Postcode.
                                </p>
                            </div>
                            <div class="creat_account">
                                {{ Form::checkbox('order', true , old('order')) }}
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <button class="btn_3" type="submit">Check and Pay</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
