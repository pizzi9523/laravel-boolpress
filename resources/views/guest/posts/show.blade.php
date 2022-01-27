@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="card" style="width: 40rem;">
                <img src="{{ $post->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->body }}</p>
                </div>
            </div>


        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->


@endsection
