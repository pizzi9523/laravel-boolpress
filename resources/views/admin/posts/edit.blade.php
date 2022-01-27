@extends('layouts.admin')


@section('content')
    <div class="container my-5">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Inserisci il titolo del post"
                    aria-describedby="helpTitle" value="{{ $post->title }}">
                <small id="helpTitle" class="text-muted">Post</small>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="image" class="form-label">Immmagine</label>
                <input type="text" name="image" id="image" class="form-control" placeholder="Inserisci URL immagine"
                    aria-describedby="helpImage" value="{{ $post->image }}">
                <small id="helpImage" class="text-muted">URL esempio: https://picsum.photos/200/300</small>
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="body" class="form-label">Descrizione Post</label>
                <textarea class="form-control" name="body" id="body" rows="3"
                    placeholder="Inserisci descrizione">{{ $post->body }}</textarea>
            </div>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button class="btn btn-primary" type="submit">Modifica</button>

        </form>

    </div>


@endsection
