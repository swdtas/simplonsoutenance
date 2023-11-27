@extends('layouts.main-front')
@section('body')
    <section id="section1-offre" class="section1-offre">
      <div class="container">

        <div class="d-flex p-5 mt-3 justify-content-between align-items-center">
          <h2>Découvrez, Postulez,  <br>Évoluez, Réussissez, Épanouissez-vous.</h2>

        </div>
      </div>
    </section>
    <section id="section2-offre" class="section2-offre">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-10 entries">
            @foreach ($offres as $offre)
            <article class="entry">
                <div class="entry-img">
                    <img src="{{ asset('storage/logos/' . $offre->entreprise->logo) }}" width="48" height="48" class="rounded-circle me-2" alt="Logo de l'entreprise">
                </div>
               <h2 class="entry-title">
                    <a href="{{ route('offres.show', $offre->id) }}">{{ $offre->titre }}</a>
                </h2>
                <div class="entry-meta">
                    <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{ route('offres.show', $offre->id) }}">{{ $offre->entreprise->nom }}</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ route('offres.show', $offre->id) }}"><time datetime="{{ $offre->created_at }}">{{ $offre->created_at->diffForHumans() }}</time></a></li>
                    </ul>
                </div>
                <div class="entry-content">
                    <p>{{ $offre->description }}</p>
                    <p>Profile: {{ $offre->Profile }}</p>
                    <div class="btn-get-started text-white">
                        <a href="{{ route('offres.show', $offre->id) }}">Voir plus</a>
                    </div>
                </div>
            </article>
        @endforeach

@endsection
