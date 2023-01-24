@extends('layouts.dash')
@section('content')
    <section class="container mt-5 pt-5">
        @include('partials.flash')
    </section>
    <section class="container pt-5 mt-5 d-flex flex-wrap gap-5 justify-content-center">
        @can('product')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Products</h5>
                    <a href="/allProducts" class="btn_3">Show all Products</a>
                </div>
            </div>
        @endcan
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Catégoris Products</h5>
                    <a href="/allCateg" class="btn_3">Show all Categoris</a>
                </div>
            </div>
        @endcan
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">New Color Products</h5>
                    <a href="/allColor" class="btn_3">Show all Color</a>
                </div>
            </div>
        @endcan
        <div class="card" style="width: 18rem;">
            <div class="card-body d-flex flex-column align-items-center">
                <h5 class="card-title">Blog</h5>
                <a href="/allBlog" class="btn_3">Show all Blogs</a>
            </div>
        </div>
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Blog tag</h5>
                    <a href="/tagBlog" class="btn_3">Show all Tag</a>
                </div>
            </div>
        @endcan
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Blog Catégoris</h5>
                    <a href="/categBlog" class="btn_3">Show all Categoris</a>
                </div>
            </div>
        @endcan
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Order</h5>
                    <a href="#" class="btn_3">Look Order</a>
                </div>
            </div>
        @endcan
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">MailBox</h5>
                    <a href="/mailBox" class="btn_3">Look Mail</a>
                </div>
            </div>
        @endcan
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">User</h5>
                    <a href="/user" class="btn_3">All user</a>
                </div>
            </div>
        @endcan
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Contact</h5>
                    <a href="/backContact/1" class="btn_3">Edit info</a>
                </div>
            </div>
        @endcan
        @can('admin')
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Favoris</h5>
                    <a href="/favoris" class="btn_3">Show all</a>
                </div>
            </div>
        @endcan
    </section>
@endsection
