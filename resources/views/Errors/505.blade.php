@extends('layouts.error')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            Errore
        </div>
        <div class="card-body">
            <h5 class="card-title">C'è stato un errore</h5>
            <p class="card-text">Conattare il servizio tecnico</p>
            <a href="{{route('login')}}" class="btn btn-primary">Login</a>
        </div>
    </div>
@endsection
