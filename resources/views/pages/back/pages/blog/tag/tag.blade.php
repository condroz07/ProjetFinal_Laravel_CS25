@extends('layouts.dash')
@section('content')
    <section class="d-flex justify-content-center pt-5 mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body d-flex flex-column align-items-center">
                <h5 class="card-title">New Categoris</h5>
                <a href="/newTagBlog" class="btn_3">Create</a>
            </div>
        </div>
    </section>
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach ($tag as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="/deleteTagBlog/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn_3">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tag->links('pagination::perso ') }}
    </section>
@endsection
