@extends('layouts.dash')
@section('content')
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5">
        @include('partials.flash')
        <h1 class="d-flex justify-content-center pb-4">Mail non archiver</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Lire</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Archive</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mail as $mails)
                    @if ($mails->isValidated === 0)
                        <tr class={{ $mails->isShow === 0 ? '' : 'bg-secondary' }}>
                            <td class={{ $mails->isShow === 0 ? '' : 'text-white' }}>{{ $mails->name }}</td>
                            <td class={{ $mails->isShow === 0 ? '' : 'text-white' }}>
                                {{ $mails->email }}
                            </td>
                            <td>
                                <form action="/mailBox/lu/{{ $mails->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn_3">Lire</button>
                                </form>
                            </td>
                            <td>
                                <form action="/mailBox/delete/{{ $mails->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn_3">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="/mailBox/archiver/{{ $mails->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn_3">Archivé</button>
                                </form>
                            </td>
                        </tr>
                    @else
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $mail->links('pagination::perso ') }}
    </section>
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5">
        <h1 class="d-flex justify-content-center pb-4">Mail archiver</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Lire</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mail as $mails)
                    @if ($mails->isValidated === 1)
                    <tr class={{ $mails->isShow === 0 ? '' : 'bg-secondary' }}>
                        <td class={{ $mails->isShow === 0 ? '' : 'text-white' }}>{{ $mails->name }}</td>
                        <td class={{ $mails->isShow === 0 ? '' : 'text-white' }}>
                            {{ $mails->email }}
                        </td>
                        <td>
                            <form action="/mailBox/lu/{{ $mails->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn_3">Lire</button>
                            </form>
                        </td>
                        <td>
                            <form action="/mailBox/delete/{{ $mails->id }}" method="POST">
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
        {{ $mail->links('pagination::perso ') }}
    </section>
@endsection
