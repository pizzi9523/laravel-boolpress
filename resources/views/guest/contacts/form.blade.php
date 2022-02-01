@extends('layouts.app')
@section('content')



    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="p-5 bg-primary text-light rounded mb-4">
            <h1 class="display-3">Contattaci</h1>
            <p class="lead">Inviaci un messaggio</p>
            <hr class="my-2">

        </div>

        <form action="{{ route('contacts.send') }}" method="post">
            @csrf

            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Come ti chiami?"
                        aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Inserisci Nome e Cognome</small>
                </div>

                <div class="col mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Inserisci la tua email"
                        aria-describedby="helpId">
                </div>
            </div>


            <div class="mb-3">
                <label for="message" class="form-label">Messaggio</label>
                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Messaggio"></textarea>
            </div>

            <button class="btn btn-primary text-light" type="submit">
                Invia</button>
        </form>
    </div>


@endsection
