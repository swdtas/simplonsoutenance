<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content   js-simplebar">
        <a class='sidebar-brand' href=''>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class='sidebar-link d-flex' href='{{ route('accueil') }}' target="_blank">
                    <ion-icon name="home-outline" style="font-size: 1.7em; color: #f7eded;"></ion-icon>
                    <span class="align-middle m-2">
                        Site public
                    </span>
                </a>
            </li>
            <li class="sidebar-header">
                @if (auth()->user()->role == 'entreprise')
            <li class="sidebar-item">
                <a class='sidebar-link' href='{{ route('offres.index') }}'>
                    <i class="align-middle" data-feather="plus-square" style="font-size: 50px; color: white;"></i>
                    <span class="align-middle">Gestions des offres</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href='{{ route('entreprises.index') }}'>
                    <i class="align-middle" data-feather="edit" style="font-size: 50px; color: white;"></i>
                    <span class="align-middle">Modifier mon profil entreprise</span>
                </a>
            </li>
        @endif
                <li class="sidebar-header">
                    @if (auth()->user()->role == 'chercheur')

                <li class="sidebar-item">
                    <a class='sidebar-link' href='{{ route('candidas.index') }}'>
                        <i class="align-middle" data-feather="list" style="font-size: 50px; color: white;"></i>
                        <span class="align-middle">modifier ma candidature</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class='sidebar-link' href='{{ route('chercheurs.index') }}'>
                        <i class="align-middle" data-feather="list" style="font-size: 50px; color: white;"></i>
                        <span class="align-middle">modifier mon profil</span>
                    </a>
                </li>
            @endif
            @if (auth()->check() && auth()->user()->role != 'chercheur' && auth()->user()->role != 'entreprise')
            <li class="sidebar-item">
                <a class='sidebar-link' href='{{ route('dashboard') }}'>
                    <i class="align-middle" data-feather="bar-chart" style="font-size: 50px; color: white;"></i> <span
                        class="align-middle">
                        Tableau de bord
                    </span>
                </a>
            </li>
            </li>
            <li class="sidebar-item ">
                <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="list" style="font-size: 50px; color: white;"></i> <span
                        class="align-middle">Gestions Entreprises</span>
                </a>
                <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class='sidebar-link'
                            href='{{ route('entreprises.index') }}'>Incritent</a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('entreprises.attente') }}'>En
                            attente de validation</a></li>
                    <li class="sidebar-item"><a class='sidebar-link'
                            href='{{ route('listes.refuser.entreprise') }}'>Refuser</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#forms" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users" style="font-size: 50px; color: white;"></i> <span
                        class="align-middle">Gestions Chercheurs</span>
                </a>
                <ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class='sidebar-link'
                            href='{{ route('chercheurs.index') }}'>Incritent</a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('chercheur.attente') }}'>En attente
                            de validation
                        </a></li>
                    <li class="sidebar-item"><a class='sidebar-link'
                            href='{{ route('listes.refuser.chercheur') }}'>chercheurs refuser</a></li>
                    </a>
            </li>
            <li class="sidebar-item"><a class='sidebar-link' href='{{ route('candidas.index') }}'>Candidatures
                </a></li>
        </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#form-plugins" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="briefcase" style="font-size: 50px; color: white;"></i> <span
                    class="align-middle">Gestions Offres d'emploi</span>
            </a>
            <ul id="form-plugins" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class='sidebar-link' href='{{ route('offres.index') }}'>Listes des offres
                    </a></li>
                <li class="sidebar-item"><a class='sidebar-link' href='{{ route('offres.today') }}'>Offres en du jour
                    </a></li>

            </ul>
        </li>
        <li class="sidebar-item ">
            <a data-bs-target="#icons" data-bs-toggle="collapse" class="sidebar-link">
                <i class="align-middle" data-feather="settings" style="font-size: 50px; color: white;"></i> <span
                    class="align-middle"> Parametres</span>
            </a>

            <ul id="icons" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                @if (auth()->user()->role != 'user')
                    <li class="sidebar-item "><a class='sidebar-link' href='{{ route('user') }}'>Gestions
                            utilisateur</a></li>
                @endif
                <li class="sidebar-item"><a class='sidebar-link' href='{{ route('regions.index') }}'>Fonctionalites</a>
                </li>
            </ul>
        </li>
        @endif
        <li id="logoutButton" class="sidebar-item">
            <a class='sidebar-link' href='#' data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="align-middle" data-feather="log-out" style="font-size: 50px; color: white;"></i> <span
                    class="align-middle">
                    Déconnexion
                </span>
            </a>
        </li>
        </ul>
    </div>
</nav>
