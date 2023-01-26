@extends('layouts.dash')
@section('content')
    <form class="container mt-5 pt-5" method="POST" action="/createNewBlog" enctype="multipart/form-data">
        @csrf
        <div class="row contact_form">
            <div class="col-md-6 form-group p_star">
                <label for="">Name</label>
                <input type="text" class="form-control" id="first" name="name" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Image for Blog</label>
                <input type="file" class="form-control" id="last" name="src" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">First text</label>
                <textarea type="text" class="form-control" id="number" name="text" cols="50" rows="10">
                </textarea>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Second text</label>
                <textarea type="text" class="form-control" id="number" name="text2" cols="50" rows="10">
                </textarea>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Lest text</label>
                <textarea type="text" class="form-control" id="number" name="text3" cols="50" rows="10">
                </textarea>
            </div>
            <div class="col-md-6 ">
                <label for="">Categoris for product</label>
                <select name="categriblogs_id" class="form-select">
                    @foreach ($categoris as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Color for product</label>
                <select name="tags_id" class="form-select">
                    @foreach ($tag as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn_3">Create</button>
            </div>
        </div>
    </form>
@endsection
