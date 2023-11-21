@extends('layouts.main-front')

@section('body')
<section id="espace_entreprise" class="d-flex mt-5 align-items-center">
<div class="container  mt-3">
  <div class="row d-flex">
    <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Bienvenue sur Votre Plateforme </h1>
        <ul>
        <li>
           
            Découvrez un espace dédié à votre entreprise
            <span class="note">Créez un compte pour mettre en avant votre entreprise auprès de chercheurs d'emplois passionnés par les nouvelles technologies.</span>
        </li>
        <li>
            <span class="icon">
                <ion-icon name="checkmark-outline"></ion-icon>
            </span>
            Gérez votre profil d'entreprise
            <span class="note">Ajoutez des détails sur votre entreprise, vos projets passionnants et les compétences que vous recherchez chez vos futurs collaborateurs.</span>
        </li>
        <li>
            <span class="icon">
                <ion-icon name="checkmark-outline"></ion-icon>
            </span>
            Rejoignez notre communauté
            <span class="note">Connectez-vous avec des chercheurs d'emplois qualifiés et trouvez les talents dont votre entreprise a besoin.</span>
        </li>
        </ul>
            <div class="mt-3">
                <a href="{{ route('entreprise-inscritpion') }}" class="btn-get-started scrollto">Inscrire mon entreprise</a>
                <a href="{{ route('login') }}" class="btn-get-quote">Se connecter</a>
            </div>
    </div>
    <div class="col-lg-6 order-1  order-lg-2 image1">
      <img src="{{ asset('images/image02.png') }}" class="img-fluid" alt="image login">
    </div>
  </div>
</div>
</section>
@endsection
