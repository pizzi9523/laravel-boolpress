@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif

    <div class="table-responsive">
        <a class="btn btn-dark mt-4 mb-4" href="{{ route('admin.products.create') }}" role="button">Add Product</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Creato il</th>
                    <th scope="col">Aggiornato il</th>
                    <th scope="col">Opzioni </th>
                    <th scope="col"> </th>



                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img width="100" height="80" src="{{ $product->image }}" alt=""></td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}€</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.products.edit', $product->id) }}"
                                role="button">Modifica</a>
                        </td>

                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger " data-toggle="modal"
                                data-target="#delete{{ $product->id }}">
                                Elimina
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminare {{ $product->name }}?</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Attenzione stai eliminando un prodotto definitivamente ⚠️
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger" type="submit">Elimina</button>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>



                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>

@endsection
