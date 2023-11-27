@extends('layouts.layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 text-end mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3 class="color1"><strong>Gestion </strong>Candidats</h3>
            </div>
            <h3 class="color1">Liste des candidats</h3>
        </div>
        <button class="btn bouton" data-toggle="modal"  data-target="#addCandidatModal">
            <ion-icon name="add-outline"></ion-icon>Poster une  Candidature
        </button>
         @include('backoffice.GestionCandidature.create')
        <div class="row mt-2">
            <div class="col-12">
                @include('partials.succes')
                @include('partials.error')
                <div class="data_table">
                    <table id="datatables-reponsive" class="table pt-3 table-striped table-bordered">
                        <thead class="table">
                            <tr>
                                <th>Chercheur</th>
                                <th>Région</th>
                                <th>Domaine</th>
                                <th>Linkedin</th>
                                <th>Actions</th>
                                <th>Github</th>
                                <th>Voir CV</th>
                               <th>Résumé Professionnel</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidats as $candidat)
                                <tr>
                                    <td>{{ optional(optional($candidat->chercheur)->user)->name }}</td>
                                    <td>{{ optional($candidat->region)->nom }}</td>
                                    <td>{{optional($candidat->domaine) ->nom }}</td>
                                    <td>{{ $candidat->linkedin }}</td>
                                    <td>
                                        <a class="btn btn-danger"
                                           href="{{ route('candidas.destroy', ['candida' => $candidat->id]) }}"
                                           onclick="event.preventDefault(); if(confirm('Voulez-vous vraiment supprimer ce candidat ?')) document.getElementById('delete-form-{{ $candidat->id }}').submit();">
                                            <i class="align-middle" data-feather="trash"></i>
                                            Supprimer
                                        </a>
                                        <form id="delete-form-{{ $candidat->id }}"
                                              action="{{ route('candidas.destroy', ['candida' => $candidat->id]) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                    <td>{{ $candidat->github }}</td>
                                    <td>
                                        <a href="{{ route('candidas.showCv', $candidat) }}" target="_blank">Voir le CV</a>
                                    </td>
                                    <td>{{ $candidat->resume_professionnel }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
