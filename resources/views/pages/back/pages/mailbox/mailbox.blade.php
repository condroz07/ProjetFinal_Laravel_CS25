@extends('layouts.dash')
@section('content')
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5">
        @include('partials.flash')
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mail as $mails)
                    <tr>
                        <td>{{ $mails->name }}</td>
                        <td>
                            {{ $mails->message }}
                        </td>
                        <td>
                            <button type="submit" class="btn_3">Lire</button>
                        </td>
                        <td>
                            <button type="submit" class="btn_3">délit</button>
                        </td>
                        <td>
                            <button type="submit" class="btn_3">Archivé</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $mail->links('pagination::perso ') }}
    </section>
@endsection
