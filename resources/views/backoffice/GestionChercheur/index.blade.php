@extends('layouts.layout.app')
@section('content')
@csrf
<div class="row mb-2 text-end mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3 class="color1"><strong>Gestion </strong>Chercheurs</h3>
    </div>
    <h3 class="color1">Listes des chercheurs inscrits</h3>
</div>
@if (auth()->user()->role == 'admin')
<a href="{{ route('chercheurs.create') }}">
    <button class="btn bouton">
        <ion-icon class="ml-3" name='person-add-outline'></ion-icon> Ajouter un chercheur
    </button>
</a>
@endif
<div class="row">
    <div class="col-12">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @php
        $counter = 1;
    @endphp
        <div class="data_table mt-2">

            <table id="datatables-reponsive" class="table pt-3 table-striped table-bordered">
                <thead class="table">
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Nom</th>
                        <th>Prénom(s)</th>
                        <th>Email</th>
                        <th>Genre</th>
                        <th>Statut</th>
                        <th>Action</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Date de naissance</th>
                        <th>Statut matrimonial</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chercheurs as $chercheur)
                        @if ($chercheur->statut === 'valide')
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>
                                    <img src="{{ asset('storage/photos/' . $chercheur->photo) }}" width="48" height="48" class="rounded-circle me-2" alt="Avatar">
                                </td>
                                <td>{{ optional($chercheur->user)->name }}</td>
                                <td>{{ optional($chercheur->user)->surname }}</td>
                                <td>{{ optional($chercheur->user)->email }}</td>
                                <td>{{ $chercheur->genre }}</td>
                                <td>{{ $chercheur->statut }}</td>
                                <td>
                                    <button class="btn btn-info m-2 btn-sm" data-toggle="modal" data-target="#chercheurDetailModal{{ $chercheur->id }}">
                                        Détail
                                        <i class="align-middle" data-feather="eye"></i>
                                    </button>

                                    <a class="btn btn-danger" href="{{ route('chercheurs.destroy', ['chercheur' => $chercheur->id]) }}" onclick="event.preventDefault(); if(confirm('Voulez-vous vraiment supprimer ce chercheur  ?')) document.getElementById('delete-form-{{ $chercheur->id }}').submit();">
                                        <i class="align-middle" data-feather="trash"></i>
                                        Supprimer
                                    </a>
                                    <form id="delete-form-{{ $chercheur->id }}" action="{{ route('chercheurs.destroy', ['chercheur' => $chercheur->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td>{{ $chercheur->adresse }}</td>
                                <td>{{ $chercheur->telephone }}</td>
                                <td>{{ $chercheur->date_naissance }}</td>
                                <td>{{ $chercheur->statut_matrimonial }}</td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="chercheurDetailModal{{ $chercheur->id }}" tabindex="-1" aria-labelledby="chercheurDetailModalLabel{{ $chercheur->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="chercheurDetailModalLabel{{ $chercheur->id }}">Détails du Chercheur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nom:</strong> {{ optional($chercheur->user)->name }}</p>
                                            <p><strong>Prénom(s):</strong> {{ optional($chercheur->user)->surname }}</p>
                                            <p><strong>Email:</strong> {{ optional($chercheur->user)->email }}</p>
                                            <p><strong>Genre:</strong> {{ $chercheur->genre }}</p>
                                            <p><strong>Statut:</strong> {{ $chercheur->statut }}</p>
                                            <p><strong>Adresse:</strong> {{ $chercheur->adresse }}</p>
                                            <p><strong>Téléphone:</strong> {{ $chercheur->telephone }}</p>
                                            <p><strong>Date de naissance:</strong> {{ $chercheur->date_naissance }}</p>
                                            <p><strong>Statut matrimonial:</strong> {{ $chercheur->statut_matrimonial }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

