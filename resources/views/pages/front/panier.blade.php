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
                            <h2>Cart Products</h2>
                            <p>Home <span>-</span>Cart Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Cart Area =================-->
    <section class="cart_area padding_top">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($panier as $item)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ asset('storage/' . $item->products->src) }}"alt=""
                                                    style="height: 20vh" />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/showProduct/{{ $item->products->id }}" class="text-dark">{{ $item->products->name }}</a>
                                    </td>
                                    <td>
                                        <h5>{{ $item->products->prix }}&nbsp;€</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input type="number" value={{ $item->quantite }}
                                                min="0" max="10">
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ $item->products->prix * $item->quantite }}&nbsp;€</h5>
                                    </td>
                                    <td>
                                        <form action="{{ route('panier.vider', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>{{ $total }}€</h5>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="/product">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="/checkout.html">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
