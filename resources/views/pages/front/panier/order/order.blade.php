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
                            <h2>Order Confirmation</h2>
                            <p>Home <span>-</span> Order Confirmation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ confirmation part start =================-->
    <section class="confirmation_part padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <span>Thank you. Your order has been received.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>order info</h4>
                        <ul>
                            <li>
                                <p>order number</p><span>: {{ $checkout->order }}</span>
                            </li>
                            <li>
                                <p>data</p><span>: {{ $checkout->created_at->toFormattedDateString('j F Y') }}</span>
                            </li>
                            <li>
                                <p>total</p><span>: {{ $checkout->products->prix * $checkout->quantite }}€</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Billing Address</h4>
                        <ul>
                            <li>
                                <p>Street</p><span>: {{ $adresse->adresse }}</span>
                            </li>
                            <li>
                                <p>country</p><span>: {{ $adresse->ville }}</span>
                            </li>
                            <li>
                                <p>postcode</p><span>: {{ $adresse->postale }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>shipping Address</h4>
                        <ul>
                            <li>
                                <p>Street</p><span>: {{ $order->adresse }}</span>
                            </li>
                            <li>
                                <p>country</p><span>: {{ $order->city }}</span>
                            </li>
                            <li>
                                <p>postcode</p><span>: {{ $order->postale }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="order_details_iner">
                        <h3>Order Details</h3>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="2"><span>{{ $checkout->products->name }}</span></th>
                                    <th>{{ $checkout->quantite }}</th>
                                    <th> <span>{{ $checkout->products->prix * $checkout->quantite }}€</span></th>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col" colspan="3">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ confirmation part end =================-->
@endsection
