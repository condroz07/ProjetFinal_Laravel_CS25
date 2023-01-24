@extends('layouts.dash')
@section('content')
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5">
        @include('partials.flash')
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $users)
                    <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <form action="/editUser/{{ $users->id }}" method="POST">
                            @csrf
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
                                @can('edit-user', $users)
                                    <button type="submit" class="btn_3">Edit</button>
                                @endcan
                            </td>
                        </form>
                        <td>
                            @can('delete-user', $users)
                                <form action="/user/delete/{{ $users->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn_3" type="submit">DELETE</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user->links('pagination::perso ') }}
    </section>
@endsection
