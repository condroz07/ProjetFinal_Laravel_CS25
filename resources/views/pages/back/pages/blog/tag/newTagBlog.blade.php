@extends('layouts.dash')
@section('content')
<form class="container mt-5 pt-5" method="POST" action="/newTagBlog">
    @include('partials.flash')
    @csrf
    <div class="row contact_form">
        <div class="col-md-6 form-group p_star">
            <label for="">Name</label>
            <input type="text" class="form-control" id="first" name="name" />
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn_3">Create</button>
        </div>
    </div>
</form>
@endsection