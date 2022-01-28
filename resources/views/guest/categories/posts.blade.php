@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            @forelse ($posts as $post)

                <div class="col-4 mb-4">
                    <a class="text-decoration-none text-dark" href="{{ route('posts.show', $post->id) }}">
                        <div class="card" style="width: 18rem;">
                            <img height="200" src="{{ $post->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->body }}</p>
                                <p class="card-text">Categoria:
                                    {{ $post->category ? $post->category->name : 'Uncategorized' }}</p>
                                <p class="card-text">
                                    Tags:
                                    @if (count($post->tags) > 0)
                                        @foreach ($post->tags as $tag)
                                            {{ $tag->name }}
                                            {{-- @if ($loop->last && count($post->tags) > 1)
                                                {{ $tag->name }}
                                            @endif --}}
                                        @endforeach
                                    @else
                                        <span>No tags</span>
                                    @endif
                                </p>

                            </div>
                        </div>
                    </a>
                </div>

            @empty
                <div class="col">
                    <h3 class="text-center">Nessun post ancora in questa categoria 😢</h3>
                </div>


            @endforelse




        </div>
        <!-- /.row -->

        <div>
            {{ $posts->links() }}
        </div>

    </div>
    <!-- /.container -->


@endsection
