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
        <form action="{{ route('admin.products.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Inserisci il nome del prodotto"
                    aria-describedby="helpName" value="{{ old('name') }}">
                <small id="helpName" class="text-muted">Prodotto</small>
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="image" class="form-label">Immmagine</label>
                <input type="text" name="image" id="image" class="form-control" placeholder="Inserisci URL immagine"
                    aria-describedby="helpImage" value="{{ old('image') }}">
                <small id="helpImage" class="text-muted">URL esempio: https://picsum.photos/200/300</small>
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Prodotto</label>
                <textarea class="form-control" name="description" id="description" rows="3"
                    placeholder="Inserisci descrizione">{{ old('description') }}</textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Inserisci prezzo"
                    aria-describedby="helpPrice" value="{{ old('price') }}">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantità</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Inserisci quantità"
                    aria-describedby="helpId" value="{{ old('quantity') }}">
            </div>
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button class="btn btn-warning" type="submit">Inserisci</button>

        </form>

    </div>


@endsection
