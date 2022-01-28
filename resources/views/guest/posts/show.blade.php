@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="card" style="width: 40rem;">
                <img src="{{ $post->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->body }}</p>
                    <p class="card-text">Categoria: {{ $post->category ? $post->category->name : 'Uncategorized' }}
                    </p>
                    <p class="card-text">
                        Tags:
                        @if (count($post->tags) > 0)
                            @foreach ($post->tags as $tag)
                                {{ $tag->name }},
                                @if ($loop->last)
                                    {{ $tag->name }}
                                @endif
                            @endforeach
                        @else
                            <span>No tags</span>
                        @endif
                    </p>


                </div>
            </div>


        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->


@endsection
