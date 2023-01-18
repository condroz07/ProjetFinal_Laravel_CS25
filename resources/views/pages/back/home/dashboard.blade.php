@extends('layouts.dash')
@section('content')
    <section class="container pt-5 mt-5 d-flex flex-wrap gap-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                <a href="/allProducts" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Catégoris Products</h5>
                <a href="/categProducts" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Color Products</h5>
                <a href="/colorProducts" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Blog</h5>
                <a href="/newBlog" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Blog tag</h5>
                <a href="/tagBlog" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Blog Catégoris</h5>
                <a href="/categBlog" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Order</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">MailBox</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </section>
@endsection
