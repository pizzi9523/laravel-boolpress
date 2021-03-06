@extends('layouts.admin')


@section('content')
    <div class="container my-5">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
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

            <div class="row mb-3">
                <div class="col-2">
                    <img style="width: 100%; " src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
                <div class="col-10">
                    <div class=" ">
                        <label for="image" class="form-label">Immmagine</label>

                        <input type="file" name="image" id="image" class="form-control" placeholder="Carica un'immagine"
                            aria-describedby="helpImage">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label for="body" class="form-label">Descrizione Post</label>
                <textarea class="form-control" name="body" id="body" rows="3"
                    placeholder="Inserisci descrizione">{{ $post->body }}</textarea>
            </div>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option selected disabled>Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category', $post->category_id) ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-check py-2">
                Select a Tag:
                @foreach ($tags as $tag)
                    <label class="form-check-label mx-4">
                        <input type="checkbox" class="form-check-input" name="tags[]" id="tags" value="{{ $tag->id }}"
                            {{ $post->tags->contains($tag->id) ? 'checked' : '' }}>
                        {{ $tag->name }}
                    </label>
                @endforeach

            </div>
            @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <button class="btn btn-primary" type="submit">Modifica</button>

        </form>

    </div>


@endsection
