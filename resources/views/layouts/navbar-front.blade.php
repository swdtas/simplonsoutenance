<!-- ======= Header ======= -->
 <header id="header" class="fixed-top ">
    <div class="container d-flex justify-content-between">
      <a href="{{ route('accueil') }}"  class="logo">
      <img src="{{ asset('images/logo.png') }}" width="100px" class=" logo" alt="Logo">
    </a>
      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto" href="{{ route('accueil') }}">Accueil</a></li>
        <li><a class="nav-link scrollto" href="{{ route('offre') }}">Offres d'emploi</a></li>
        <li><a class="nav-link scrollto" href="{{ route('candidat') }}">Profils candidats</a></li>
        <li><a class="nav-link scrollto" href="{{ route('entreprise') }}">Les entreprises</a></li>

        <li>
            <a href="{{ route('chercheur-inscritpion') }}" class="btn px-3 bouton" >Espace Chercheur</a>
        </li>
        <li>
            <a href="{{ route('entreprise-inscritpion') }}"class="btn px-3 bouton" >Espace Entreprise</a>
        </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
