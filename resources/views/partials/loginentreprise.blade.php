@extends('layouts.main-front')
@section('body')
<section id="section1-accueil" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Bienvenue<span> sur Recrutburkina</span></h1>
      <h2> votre plateforme de  recherche d'emploi
 dans le domaine de la technologie</h2>
    </div>
  </section>
   <!-- ======= entreprise Section ======= -->
   <section id="section2-accueil" class="section2-accueil">
    <div class="container">
        <div class="section-title">
            <h2>Les entreprises de la semaine</h2>
        </div>
        <div class="row">
            @foreach ($dernieresEntreprises as $entreprise)
                <div class="col-lg-6 col-md-6 col-12 " data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="icon-box iconbox-blue m-2">
                        <div class="icon">
                            <img src="{{ asset('storage/logos/' . $entreprise->logo) }}" width="100" height="100" class="rounded-circle me-2" alt="Logo de l'entreprise">
                        </div>
                        <h4><a href="{{ route('entreprises.show', $entreprise->id) }}">{{ $entreprise->nom }}</a></h4>
                        <p>{{ $entreprise->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="section-title justify-content-center mt-5">
            <div class="row justify-content-center">
                <div class="col">
                    <a href="{{ route('entreprise') }}" class="btn    bouton" style="color: #ffff;"> Voir plus</a>
                </div>
            </div>
      </div>

    </div>
</section>
<section id="section3-accueil" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="section-title">
            <h2 class="text-white">Les candidats de la semaine</h2>
        </div>
    <div class="row">
                    @foreach ($candidats as $candidat)
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <img src="{{ asset('storage/photos/' . $chercheurs->photo) }}" alt="Photo du candidat" class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ optional(optional($candidat->chercheur)->user)->name }}</h5>
                                    <p class="card-text">{{ optional($candidat->region)->nom }}</p>
                                    <p class="card-text">{{ $candidat->resume_professionnel }}</p>
                                    <p class="card-text">Domaine: {{ optional($candidat->domaine)->nom }}</p>
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
            </div>
    </div>
  </section>
  <section id="section2-accueil" class="section2-accueil">
    <div class="container">
        <div class="section-title">
            <h2>Les entreprises de la semaine</h2>
        </div>
        <div class="row">
            @foreach ($dernieresEntreprises as $entreprise)
                <div class="col-lg-6 col-md-6 col-12 " data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="icon-box iconbox-blue m-2">
                        <div class="icon">
                            <img src="{{ asset('storage/logos/' . $entreprise->logo) }}" width="100" height="100" class="rounded-circle me-2" alt="Logo de l'entreprise">
                        </div>
                        <h4><a href="{{ route('entreprises.show', $entreprise->id) }}">{{ $entreprise->nom }}</a></h4>
                        <p>{{ $entreprise->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="section-title justify-content-center mt-5">
            <div class="row justify-content-center">
                <div class="col">
                    <a href="{{ route('entreprise') }}" class="btn    bouton" style="color: #ffff;"> Voir plus</a>
                </div>
            </div>
      </div>

    </div>
</section>
@endsection
