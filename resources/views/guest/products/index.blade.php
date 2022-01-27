@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            @foreach ($products as $product)

                <div class="col-4 mb-4">
                    <a class="text-decoration-none text-dark" href="{{ route('products.show', $product->id) }}">
                        <div class="card" style="width: 18rem;">
                            <img height="200" src="{{ $product->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p>Prezzo: <span>{{ $product->price }}€</span></p>
                                <p>Quantità: <span>{{ $product->quantity }}</span></p>
                                <a class="btn btn-warning" href="">Acquista</a>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
