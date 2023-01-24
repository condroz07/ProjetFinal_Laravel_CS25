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
                @foreach ($user as $users)
                    <form action="/editUser/{{ $users->id }}" method="POST">
                        @csrf
                        <tr>
                            <td>{{ $users->name }}</td>
                            <td>
                                <select name="role_id" id="">
                                    <option selected>{{ $users->role->role }}</option>
                                    @foreach ($role as $items)
                                        @if ($items->role == $users->role->role)
                                        @else
                                            <option value="{{ $items->id }}">{{ $items->role }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn_3">Edit</button>
                            </td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
        {{ $user->links('pagination::perso ') }}
    </section>
@endsection
