@extends('layouts.main')
@section('body')
@csrf
<div class="container ml-3">

    <a href="{{ route('register') }}">
        <button type="submit" class="btn m-3 btn-success">
            <ion-icon class="ml-3" name='person-add-outline'></ion-icon>ajouter un utilisateur
        </button>
    </a>
</div>
<div class="row">
        <div class="col-12">
                @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
<div class="data_table">
                <table id="example" class="table pt-3 table-striped table-bordered">
                    <thead class="table">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom(s)</th>
                            <th>Email</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                         
                            <td>
                                <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary m-2 btn-sm">Modifier</a>
                                <button class="btn btn-info m-2 btn-sm" data-toggle="modal"
                                    data-target="#userDetailModal{{ $user->id }}">Détail</button>
                                <a href="{{ route('deleteUser', ['id' => $user->id]) }}"
                                    onclick="event.preventDefault(); if(confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) document.getElementById('delete-form-{{ $user->id }}').submit();">
                                    Supprimer
                                </a>
                                <form id="delete-form-{{ $user->id }}"
                                    action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>

                            <div class="modal fade" id="userDetailModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="userDetailModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="userDetailModalLabel{{ $user->id }}">Détails de
                                                l'utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nom: </strong>{{ $user->name }}</p>
                                            <p><strong>Prénom(s): </strong>{{ $user->surname }}</p>
                                            <p><strong>Email: </strong>{{ $user->email }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection