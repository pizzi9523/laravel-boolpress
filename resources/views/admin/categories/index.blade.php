@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif



    <div class="container-fluid">
        <h1 class="my-5">Categories</h1>
        <div class="row">

            <div class="col-6">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf

                    <div class="my-3">
                        <label for="name" class="form-label">Categoria</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Inserisci Categoria"
                            aria-describedby="helpId">
                    </div>

                    <button type="submit" class="btn btn-dark">Add Category</button>
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </form>


            </div>

            <div class="col-6">
                <ul class="list-group my-3">

                    @foreach ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <input type="text" class="form-control border-0 bg-white" name="name" id="name"
                                    aria-describedby="helpId" value="{{ $category->name }}">
                            </form>
                            <span
                                class="badge badge-pill rounded-circle bg-secondary text-light mx-4">{{ count($category->posts) }}</span>

                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn mx-4 text-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>


                        </li>

                    @endforeach
                </ul>
            </div>

        </div>

    </div>



@endsection
