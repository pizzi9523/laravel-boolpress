@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="card" style="width: 40rem;">
                <img src="{{ $product->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p>Prezzo: <span>{{ $product->price }}€</span></p>
                    <p>Quantità: <span>{{ $product->quantity }}</span></p>
                    <a class="btn btn-warning btn-lg btn-block" href="">Acquista</a>

                </div>
            </div>


        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->


@endsection
