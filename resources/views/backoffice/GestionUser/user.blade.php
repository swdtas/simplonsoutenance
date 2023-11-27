@extends('layouts.layout.app')
@section('content')
@csrf
<div class="container-fluid p-0">
    <div class="row mb-2 text-end mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="color1"><strong>Gestion </strong>Utilisateur</h3>
        </div>
    </div>
    <a href="{{ route('users.create') }}">
        <button type="submit" class="btn m-3 bouton">
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
            <table id="datatables-reponsive" class="table pt-3 table-striped table-bordered">
                <thead class="table">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom(s)</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                    @if (in_array($user->role, ['user', 'admin']))
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary m-2 btn-sm">
                                    <i class="align-middle" data-feather="edit-2"></i>
                                    Modifier
                                </a>
                                <!-- ... (votre code d'action) ... -->
                                <button class="btn btn-info m-2 btn-sm" data-toggle="modal"
                                    data-target="#userDetailModal{{ $user->id }}">Détail
                                    <i class="align-middle" data-feather="eye"></i>
                                </button>
                                <!-- ... (votre code d'action) ... -->
                                <a class="btn btn-danger" href="{{ route('deleteUser', ['id' => $user->id]) }}"
                                    onclick="event.preventDefault(); if(confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) document.getElementById('delete-form-{{ $user->id }}').submit();">
                                    <i class="align-middle" data-feather="trash"></i>
                                    Supprimer
                                </a>
                                <form id="delete-form-{{ $user->id }}"
                                    action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals en dehors de la boucle -->
@foreach ($users as $user)
    <div class="modal fade" id="userDetailModal{{ $user->id }}" tabindex="-1"
        aria-labelledby="userDetailModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailModalLabel{{ $user->id }}">Détails de l'utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nom: </strong>{{ $user->name }}</p>
                    <p><strong>Prénom(s): </strong>{{ $user->surname }}</p>
                    <p><strong>Email: </strong>{{ $user->email }}</p>
                    <p><strong>Role: </strong>{{ $user->role}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
