<section id="section3-accueil" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="section-title">
            <h2 class="text-white">Les candidats de la semaine</h2>
        </div>
    <div class="row">
                    @foreach ($candidats as $candidat)
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    <img src="{{ asset('storage/photos/' . optional($candidat->chercheur)->photo) }}" class="img-fluid" alt="Avatar">
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
