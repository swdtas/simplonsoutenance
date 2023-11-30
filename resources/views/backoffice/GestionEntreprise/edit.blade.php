@extends('layouts.layout.app')
@section('content')
@csrf
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-header btn-b">
            <h5 class="card-title text-center">Éditer compte Entreprise</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('entreprises.update', $entreprise->id) }}" class="vstack gap-2"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseName" class="form-label">Nom de l'entreprise <span
                                    class="text-danger" style="font-size: 1.2em;">*</span>:</label>
                            <input type="text" name="nom" class="form-control" id="enterpriseName"
                                value="{{ old('nom', $entreprise->nom) }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseWebsite" class="form-label"> <span class="text-danger"
                                    style="font-size: 1.2em;">*</span>
                                Site Web :</label>
                            <input type="text" name="site_web" class="form-control" id="enterpriseWebsite"
                                value="{{ old('site_web', $entreprise->site_web) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseAddress" class="form-label">Adresse <span class="text-danger"
                                    style="font-size: 1.2em;">*</span>
                                :</label>
                            <input type="text" name="adresse" class="form-control" id="enterpriseAddress"
                                value="{{ old('adresse', $entreprise->adresse) }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseCreationDate" class="form-label">Date de Création :</label>
                            <input type="date" name="date_creation" class="form-control"
                                id="enterpriseCreationDate"
                                value="{{ old('date_creation', $entreprise->date_creation) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseRegion" class="form-label">Région <span class="text-danger"
                                    style="font-size: 1.2em;">*</span>
                                :</label>
                            <select name="region_id" class="form-control" id="enterpriseRegion" required>
                                <option value="" disabled selected>Sélectionnez une région</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}"
                                        {{ old('region_id', $entreprise->region_id) == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseLogo" class="form-label">Logo :</label>

                            @if($entreprise->logo)
                                <p>Logo actuel :</p>
                                <img src="{{ asset('storage/logos/' . $entreprise->logo) }}" alt="Logo actuel" class="mb-2" width="50">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="keepLogo" id="keepLogo" value="1">
                                    <label class="form-check-label" for="keepLogo">
                                        Garder le logo actuel
                                    </label>
                                </div>
                            @endif

                            <input type="file" name="logo" class="form-control" id="logo">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="enterpriseDescription" class="form-label">Description <span class="text-danger"
                                style="font-size: 1.2em;">*</span>
                            :</label>
                        <textarea name="description" class="form-control" id="enterpriseDescription"
                            required>{{ old('description', $entreprise->description) }}</textarea>
                    </div>
                </div>


                <button type="submit" class="btn bouton">Modifier Entreprise</button>
            </form>
        </div>
    </div>
</div>

@endsection
