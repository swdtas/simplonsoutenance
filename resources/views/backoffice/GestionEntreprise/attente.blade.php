@extends('layouts.layout.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row mb-2 text-end mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="color1"><strong>Gestion </strong>Entreprises</h3>
        </div>
        <h3 class="color1">{{$title}}</h3>
    </div>
    <button class="btn bouton"  data-toggle="modal"  data-target="#addEnterpriseModal">
        <ion-icon class="ml-3" name='person-add-outline'></ion-icon>ajouter une entreprise
    </button>
    @include('backoffice.GestionEntreprise.create')
    <div class="row mt-2">
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
                            <th>Logo</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Statut</th>
                             <th>Actions</th>
                            <th>Adresse</th>
                            <th>Site Web</th>
                            <th>Date de Création</th>
                            <th>Utilisateur</th>
                            <th>Région</th>

                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entreprises as $entreprise)
                            @if ($entreprise->statut === 'en attente')
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/image02.png') }}" width="48" height="48" class="rounded-circle me-2" alt="Avatar">
                                    </td>
                                    <td>{{ $entreprise->nom }}</td>
                                    <td>{{ $entreprise->description }}</td>
                                    <td>{{ $entreprise->statut }}</td>

                                    <td>
                                        <form action="{{ route('valider.entreprise', ['id' => $entreprise->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Valider</button>
                                        </form>
                                        <form action="{{ route('refuser.entreprise', ['id' => $entreprise->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Refuser</button>
                                        </form>
                                    </td>
                                    <td>{{ $entreprise->adresse }}</td>
                                    <td>{{ $entreprise->site_web }}</td>
                                    <td>{{ $entreprise->date_creation }}</td>
                                    <td>{{ $entreprise->user->name }}</td>
                                    <td>{{ $entreprise->region->nom }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modals en dehors de la boucle -->
@foreach ($entreprises as $entreprise)
    <div class="modal fade" id="entrepriseDetailModal{{ $entreprise->id }}" tabindex="-1"
         aria-labelledby="entrepriseDetailModalLabel{{ $entreprise->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="entrepriseDetailModalLabel{{ $entreprise->id }}">Détails de l'entreprise</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nom: </strong>{{ $entreprise->nom }}</p>
                    <p><strong>Description: </strong>{{ $entreprise->description }}</p>
                    <p><strong>Adresse: </strong>{{ $entreprise->adresse }}</p>
                    <p><strong>Site Web: </strong>{{ $entreprise->site_web }}</p>
                    <p><strong>Date de Création: </strong>{{ $entreprise->date_creation }}</p>
                    <p><strong>Utilisateur: </strong>{{ $entreprise->user->name }}</p>
                    <p><strong>Région: </strong>{{ $entreprise->region->nom }}</p>
                    <p><strong>Logo: </strong>{{ $entreprise->logo }}</p>
                    <p><strong>Statut: </strong>{{ $entreprise->statut }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
