@extends('layouts.dash')
@section('content')
    <form class="container mt-5 pt-5" method="POST" action="/createProduct" enctype="multipart/form-data">
        @csrf
        <div class="row contact_form">
            <div class="col-md-6 form-group p_star">
                <label for="">Name</label>
                <input type="text" class="form-control" id="first" name="name" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Image for product</label>
                <input type="file" class="form-control" id="last" name="src" />
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Quantite for product</label>
                <input type="number" class="form-control" id="number" name="quantite" value="0"/>
            </div>
            <div class="col-md-6 ">
                <label for="">Categoris for product</label>
                <select name="categoris_id" class="form-select">
                    @foreach ($categoris as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Color for product</label>
                <select name="couleur_id" class="form-select">
                    @foreach ($color as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Prix for product</label>
                <input type="number" class="form-control" id="add1" name="prix" value="0" />
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn_3">Create</button>
            </div>
        </div>
    </form>
@endsection
