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
    @include('partials.flash')
    <section class="container pt-5 mt-5 d-flex flex-wrap gap-5 justify-content-center">
        @foreach ($products as $item)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $item->src) }}" class="card-img-top" alt="..." style="height: 35vh">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <div class="d-flex gap-2">
                        <a href="/editProducts/{{ $item->id }}" class="btn_3">édit</a>
                        @if (Auth::user()->role_id == 1)
                            <form action='/deleteProduct/{{ $item->id }}' method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn_1" type="submit">Delete</button>
                            </form>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <section class="p-5">
        {{ $products->links('pagination::perso ') }}
    </section>
@endsection
