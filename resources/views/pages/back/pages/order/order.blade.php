@extends('layouts.dash')
@section('content')
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5">
        @include('partials.flash')
        <h1 class="d-flex justify-content-center pb-4">Order none archiver</h1>
        <table class="table">
            <thead>
                    <th scope="col">Email</th>
                    <th scope="col">Order</th>
                    <th scope="col">Validate</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $orders)
                    @if ($orders->isValidated === 0)
                        <tr>
                            <td>
                                {{ $orders->email }}
                            </td>
                            <td>
                                {{ $orders->order }}
                            </td>
                            <td>
                                <form action="/allOrder/{{ $orders->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn_3">Validate</button>
                                </form>
                            </td>
                            <td>
                                <form action="/deleteOrder/{{ $orders->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn_3">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @else
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $order->links('pagination::perso ') }}
    </section>
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5">
        <h1 class="d-flex justify-content-center pb-4">Order archiver</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Order</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order2 as $orders)
                    @if ($orders->isValidated === 1)
                        <tr>
                            <td>
                                {{ $orders->email }}
                            </td>
                            <td>
                                {{ $orders->order }}
                            </td>
                            <td>
                                <form action="/deleteOrder/{{ $orders->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn_3">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @else
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $order2->links('pagination::perso ') }}
    </section>
@endsection
