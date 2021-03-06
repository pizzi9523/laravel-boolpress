@extends('layouts.admin')


@section('content')
    <div class="container my-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Inserisci il titolo"
                    aria-describedby="helpTitle" value="{{ old('title') }}">
                <small id="helpTitle" class="text-muted">Titolo</small>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="image" class="form-label">Immmagine</label>

                <input type="file" name="image" id="image" class="form-control" placeholder="Carica un'immagine"
                    aria-describedby="helpImage">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="body" class="form-label">Descrizione Post</label>
                <textarea class="form-control" name="body" id="body" rows="3"
                    placeholder="Inserisci Contenuto">{{ old('body') }}</textarea>
            </div>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option selected disabled>Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-check py-2">
                Select a Tag:
                @foreach ($tags as $tag)
                    <label class="form-check-label mx-4">
                        <input type="checkbox" class="form-check-input" name="tags[]" id="tags" value="{{ $tag->id }}">
                        {{ $tag->name }}

                    </label>
                @endforeach

            </div>
            @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror



            <button class="btn btn-warning" type="submit">Inserisci</button>

        </form>

    </div>


@endsection
