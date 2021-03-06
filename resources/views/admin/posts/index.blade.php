@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif
    <h1 class="mt-5">Posts</h1>

    <div class="table-responsive">
        <a class="btn btn-dark mt-4 mb-4" href="{{ route('admin.posts.create') }}" role="button">Add post</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Creato il</th>
                    <th scope="col">Aggiornato il</th>
                    <th scope="col">Opzioni </th>
                    <th scope="col"> </th>
                    <th scope="col"> </th>




                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td><img width="100" height="80" src="{{ asset('storage/' . $post->image) }}" alt=""></td>
                        <td>{{ $post->body }}</td>
                        <td>
                            @if ($post->category)
                                <a
                                    href="{{ route('categories.posts', $post->category->id) }}">{{ $post->category->name }}</a>
                            @else
                                <p>Uncategorized</p>
                            @endif
                        </td>

                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>

                        <td>
                            <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}"
                                role="button">Visita</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}"
                                role="button">Modifica</a>
                        </td>

                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                data-bs-target="#delete{{ $post->id }}">
                                Elimina
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete{{ $post->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminare {{ $post->name }}?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Attenzione stai eliminando un post definitivamente ??????
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
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

    <div>
        {{ $posts->links() }}
    </div>

@endsection
