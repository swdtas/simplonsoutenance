@extends('layouts.main-front')
@section('body')
<section id="sect-entreprise" class="d-flex align-items-center">
    <div class=" corow bloc">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="mt-2">Bienvenue<span> sur Recrutburkina</span></h1>
            <h2> Découvrez un monde d'opportunités dans le domaine de <br> la technologie. Rejoignez-nous dès maintenant  pour connecter  <br>vos talents aux meilleurs profils.</h2>
          </div>
          <div class="d-flex mt-3">
              <a href="{{ route('login') }}" class="btn-get-started">Connexion</a>
        </div>
    </div>
  </section>
</section>
<div class="container-fluid pb-5 col-10  col-md-1o col-xxl-10">
    @include('backoffice.GestionEntreprise.form')
</div>

@endsection
