@extends('layouts.dash')
@section('content')
    <form class="container mt-5 pt-5" method="POST" action="/sendResponse">
        @csrf
        <div class="row contact_form">
            <input type="text" name="email" value="{{ $mail->email }}" class="d-none">
            <input type="text" name="contacts_id" value="{{ $mail->id }}" class="d-none">
            <div class="col-md-6 form-group p_star">
                <label for="">First text</label>
                <textarea type="text" class="form-control" id="number" name="rps" cols="50" rows="10">
                </textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn_3">Send</button>
            </div>
        </div>
    </form>
@endsection
