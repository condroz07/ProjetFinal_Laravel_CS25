@extends('layouts.dash')
@section('content')
    <section class="container d-flex flex-column justify-content-center pt-5 mt-5 gap-5">
        <div>
            <a href="/mailBox" class="btn_2">Back</a>
        </div>
        <div class="d-flex flex-column gap-3">
            <h2>
                {{ $mail->email }}
            </h2>
            <h3>
                {{ $mail->sujet }}
            </h3>
            <p>
                {{ $mail->msg }}
            </p>
        </div>
        <div>
            <a class="btn_3 text-white" href="/response/{{ $mail->id }}">Répondre</a>
        </div>
    </section>
@endsection
