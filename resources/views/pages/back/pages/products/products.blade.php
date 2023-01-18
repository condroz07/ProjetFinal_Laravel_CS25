@extends('layouts.dash')
@section('content')
    <section class="d-flex justify-content-center pt-5 mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body d-flex flex-column align-items-center">
                <h5 class="card-title">New Products</h5>
                <a href="/newProducts" class="btn_3">Create</a>
            </div>
        </div>
    </section>
    <section class="container pt-5 mt-5 d-flex flex-wrap gap-5 justify-content-center">
        @foreach ($products as $item)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $item->src) }}" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <a href="/editProducts/{{ $item->id }}" class="btn_3">édit</a>
                </div>
            </div>
        @endforeach
    </section>
@endsection
