@extends('layouts.dash')
@section('content')
    @can('blog.create')
        <section class="d-flex justify-content-center pt-5 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">New Blog</h5>
                    <a href="/createBlog" class="btn_3">Create</a>
                </div>
            </div>
        </section>
    @endcan
    @include('partials.flash')
    <div class="container pt-5 mt-5 d-flex flex-wrap gap-5 justify-content-center">
        <h2>Blog Non Validé</h2>
    </div>
    <section class="container pt-5 mt-5 d-flex flex-wrap gap-5 justify-content-center">
        @foreach ($blog as $item)
            @if ($item->isValidated === 0)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $item->src) }}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @can('blog.edit', $item)
                                <a href="/editBlog/{{ $item->id }}" class="btn_3">édit</a>
                            @endcan
                            @can('blog.delete', $item)
                                <form action='/deleteBlog/{{ $item->id }}' method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn_1" type="submit">Delete</button>
                                </form>
                            @endcan
                            @can('blog.validate', $item)
                                <form action='/validateBlog/{{ $item->id }}' method="POST">
                                    @csrf
                                    <button class="btn_1" type="submit">Validate</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @else
            @endif
        @endforeach
    </section>
    <div class="container pt-5 mt-5 d-flex flex-wrap gap-5 justify-content-center">
        <h2>Blog Validé</h2>
    </div>
    <section class="container pt-5 mt-5 d-flex flex-wrap gap-5 justify-content-center">
        @foreach ($blog as $item)
            @if ($item->isValidated === 1)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $item->src) }}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @can('blog.edit', $item)
                                <a href="/editBlog/{{ $item->id }}" class="btn_3">édit</a>
                            @endcan
                            @can('blog.delete', $item)
                                <form action='/deleteBlog/{{ $item->id }}' method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn_1" type="submit">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @else
            @endif
        @endforeach
    </section>
    <section class="p-5">
        {{ $blog->links('pagination::perso') }}
    </section>
@endsection
