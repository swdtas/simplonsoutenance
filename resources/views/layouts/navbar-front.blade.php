<!-- ======= Header ======= -->
 <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="#" class="logo">
      <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Logo">
    </a>
      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto" href="{{ route('accueil') }}">Accueil</a></li>
        <li><a class="nav-link scrollto" href="{{ route('offre') }}">Offres d'emploi</a></li>
        <li><a class="nav-link scrollto" href="{{ route('candidat') }}">Profils candidats</a></li>
        <li><a class="nav-link scrollto" href="{{ route('actualite') }}">Actualites</a></li>
        <li>
          <a href="index.html#about" class="btn bouton px-3">Espace candidat</a>
        </li>
        <li>
          <a href="{{ route('espace_entreprise') }}" class="btn px-3   bouton">Espace Entreprise</a>
        </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->