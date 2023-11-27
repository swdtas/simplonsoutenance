@extends('layouts.main-front')
@section('body')
<section id="section1-entreprise" class="section1-entreprise">
    <div class="container">

        <div class="d-flex p-5 justify-content-between align-items-center">
            <h2>Explorez, Candidatez, Évoluez, Prospérez, <br> Réalisez votre plein potentiel dans les meilleures <br>entreprise des Hommes intègres</h2>
        </div>

    </div>
  </section>
  <section id="section2-accueil" class="section2-accueil">
    <div class="container">
        <div class="row">
            @foreach ($entreprisesValides as $entreprise)
            <div class="col-lg-6 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="icon-box iconbox-blue">
                    <div class="icon">
                        <img src="{{ asset('storage/logos/' . $entreprise->logo) }}" width="100" height="100" class="rounded-circle me-2" alt="Logo de l'entreprise">
                    </div>
                    <h4><a href="{{ route('entreprises.show', $entreprise->id) }}">{{ $entreprise->nom }}</a></h4>
                    <p>{{ $entreprise->description }}</p>

                    {{-- "Voir Plus" Button with Icon --}}
                    <a href="{{ route('entreprises.show', $entreprise->id) }}" class="btn btn-primary">
                        Voir Plus
                        <ion-icon name="arrow-forward-outline" class="ms-2"></ion-icon>
                    </a>

                    {{-- Icon for Company Website --}}
                    @if ($entreprise->site_web)
                        <a href="{{ $entreprise->site_web }}" target="_blank" class="btn btn-secondary ms-2">
                            <ion-icon name="globe-outline" class="me-2"></ion-icon>
                            Site Web
                        </a>
                    @endif
                </div>
            </div>
        @endforeach

        </div>

    </div>
</section>

@endsection
