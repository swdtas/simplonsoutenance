@extends('layouts.layout.app')
@section('content')
    @csrf
    <div class="row mb-2 text-end mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="color1"><strong>Gestion </strong>Chercheurs</h3>
        </div>
        <h3 class="color1">Listes des chercheurs en attente</h3>
    </div>

    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="data_table mt-2">
                <table id="datatables-reponsive" class="table pt-3 table-striped table-bordered">
                    <thead class="table">
                        <tr>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prénom(s)</th>
                            <th>Email</th>
                            {{-- <th>Action</th> --}}
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
                            @if ($chercheur->statut === 'en attente')
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/photos/' . $chercheur->photo) }}" width="48"
                                            height="48" class="rounded-circle me-2" alt="Avatar">
                                    </td>

                                    <td>{{ optional($chercheur->user)->name }}</td>
                                    <td>{{ optional($chercheur->user)->surname }}</td>
                                    <td>{{ optional($chercheur->user)->email }}</td>

                                    {{-- Reste du code ... --}}
                                    {{-- <td>
                            <!-- Actions ... -->
                        </td> --}}

                                    <td>{{ $chercheur->genre }}</td>
                                    <td>{{ $chercheur->statut }}</td>
                                    <td>
                                        <form action="{{ route('valider.chercheur', ['id' => $chercheur->id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Valider</button>
                                        </form>
                                        <form action="{{ route('refuser.chercheur', ['id' => $chercheur->id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Refuser</button>
                                        </form>
                                    </td>
                                    <td>{{ $chercheur->adresse }}</td>
                                    <td>{{ $chercheur->telephone }}</td>
                                    <td>{{ $chercheur->date_naissance }}</td>
                                    <td>{{ $chercheur->statut_matrimonial }}</td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
