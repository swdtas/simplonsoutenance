@extends('layouts.main-front')

@section('body')
<section id="sect-cher1" class="d-flex align-items-center">
    <div class="row bloc">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Bienvenue<span> sur la page chercheur d'emploi</span></h1>
        <h2>Boostez votre carrière ! Inscrivez-vous pour des opportunités exceptionnelles maintenant.</h2>
      </div>
      <div class="d-flex">
        <a href="{{ route('login') }}" class="btn-get-started">Connexion</a>
    </div>
    </div>
  </section>
<div class="container-fluid pb-5 col-10 mt-2 col-md-10 col-xxl-10">
    @include('backoffice.GestionChercheur.form')
</div>
@endsection
