@extends('layouts.main-front')
@section('body')
<section id="section1-candidat" class="section1-candidat">
    <div class="container">

      <div class="d-flex p-5 mt-3 justify-content-between align-items-center">
        <h2>Rencontrez nos talents exceptionnels : les candidats qui façonnent l'avenir de demain avec passion et expertise.</h2>

      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <form class="form-inline d-flex" method="GET" action="{{ route('candidat') }}">
                @csrf
                <label for="region_id" class="sr-only">Sélectionnez une région :</label>
                    <select name="region_id" id="region_id" class="form-control">
                        <option value="" {{ $selectedRegion === null ? 'selected' : '' }}>Toutes les régions</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}" {{ $selectedRegion == $region->id ? 'selected' : '' }}>{{ $region->nom }}</option>
                        @endforeach
                    </select>
                <button class="btn bouton" type="submit">Rechercher</button>
            </form>
        </div>
    </div>

    </div>
  </section>
<section>
    <div class="row">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($candidats as $candidat)
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ asset('storage/photos/' . optional($candidat->chercheur)->photo) }}" alt="Avatar" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ optional(optional($candidat->chercheur)->user)->name }}</h5>
                            <h5 class="card-title">{{ optional(optional($candidat->chercheur)->user)->surname }}</h5>
                            <p class="card-text">{{ $candidat->resume_professionnel }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <p class="card-text">
                                <a class="text-stard" href="{{ $candidat->linkedin }}" target="_blank">LinkedIn</a>
                                <span class="mx-2">-</span>
                                <a class="text-end" href="{{ $candidat->github }}" target="_blank">GitHub</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>

@endsection

