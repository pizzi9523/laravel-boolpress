@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif
    <h1 class="mt-5">Contacts</h1>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Messaggio</th>
                    <th scope="col">Ricevuto il</th>
                    <th scope="col">Opzioni </th>
                    <th scope="col"> </th>
                    <th scope="col"> </th>




                </tr>
            </thead>
            <tbody>

                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at }}</td>

                        {{-- <td>
                            <a class="btn btn-primary" href="{{ route('admin.contacts.show', $contact->id) }}"
                                role="button">Visita</a>
                        </td> --}}
                        {{-- <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}"
                                role="button">Modifica</a>
                        </td> --}}

                        {{-- <td>
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
                                            Attenzione stai eliminando un post definitivamente ⚠️
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


                        </td> --}}



                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <div>
        {{ $contacts->links() }}
    </div>

@endsection
