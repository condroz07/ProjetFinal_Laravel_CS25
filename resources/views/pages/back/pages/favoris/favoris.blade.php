@extends('layouts.dash')
@section('content')
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Products Name</th>
                    <th scope="col">User name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($favoris as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="/showProduct/{{ $item->products_id }}" class="text-dark">{{ $item->products->name }}</a></td>
                        <td>{{ $item->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $favoris->links('pagination::perso ') }}
    </section>
@endsection
