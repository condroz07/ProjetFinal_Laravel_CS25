@extends('layouts.dash')
@section('content')
<section class="container mt-5 pt-5">
        @include('partials.flash')
        <form action="/editContact/{{ $item->id }}" method="POST" class="row contact_form">
            @csrf
            <div class="col-md-6 form-group p_star">
                <label for="">Entreprise</label>
                <input type="text" class="form-control" id="first" name="entreprise" value="{{ $item->entreprise }}" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Ville</label>
                <input type="text" class="form-control" id="first" name="ville" value="{{ $item->ville }}" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Adresse</label>
                <input type="text" class="form-control" id="first" name="adresse" value="{{ $item->adresse }}" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Code Postale</label>
                <input type="text" class="form-control" id="first" name="postale" value="{{ $item->postale }}" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Phone Number</label>
                <input type="text" class="form-control" id="first" name="phone" value="{{ $item->phone }}" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Email</label>
                <input type="text" class="form-control" id="first" name="email" value="{{ $item->email }}" />
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn_3">Edit</button>
            </div>
        </form>
    </section>
@endsection
