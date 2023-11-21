<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio-market</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
</head>
<body>
<header>
 <nav class="navbar  navbar-expand-lg  " >
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse  navbar-collapse justify-content-start " id="collapsibleNavbar">
            <ul class="navbar-nav container  ">
                <li class="nav-item  ">
                    <a class="nav-link text-white active" href="#section2">Accueil</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="#propos">A propos de nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#service">Produits</a>
                </li>
            </ul>
          </div>
          <div class>
          <form class="d-flex justify-content-end" role="search">
                    <input class="form-control  mx-1 " type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
          </div>
         </div>
     </nav>
</header>
<main>
<section class="accueil">
  <h3 > Bienvenue dans notre Plateforme de Produits Bio!</h3>
</section>
@csrf
<div class="container-fluid p-0">
    <div class="row mb-2 text-end mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="color1"><strong>Gestion </strong>Utilisateur</h3>
        </div>
    </div>
    <div class="row mb-2 mb-xl-3">
      <div class="col-auto ms-auto text-end mt-n1">
        <a href="index.html#" class="btn btn-light bg-white me-2">Invite a Friend</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Ajout d'un utilisateur</a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
          <h5 class="card-title">
          </h5>
          <h6 class="card-subtitle text-muted">Highly flexible tool that many advanced features to any HTML table. See official
      </div>
      <div class="card-body">
          <table id="datatables-reponsive" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th>Nom</th>
                      <th>Prénom(s)</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                      <a href="{{ route('editUser' , $user) }}"
                       class="btn btn-primary">
                        <i class="align-middle" data-feather="edit-2"></i>
                        Editer
                      </a>
                      <a
                      data-bs-toggle="modal" data-bs-target="#defaultModalPrimary{{ $user->id }}"
                       class="btn btn-danger">
                        <i class="align-middle" data-feather="trash"></i>
                        Supprimer
                      </a>

                      <div class="modal fade" id="defaultModalPrimary{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">
                                {{ $user->name }}
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                              <p class="mb-0 text-dark">
                                Etes vous sur de vouloir supprimer cet utilisateur ?
                              </p>
                            </div>
                            <form method="POST" action="{{ route('deleteUser' , $user) }}" id="form-delete-{{ $user->id }}">
                              @csrf
                              @method('DELETE')
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('form-delete-{{ $user->id }}').submit()">Valider

                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </td>

                </tr>
                  @endforeach

              </tbody>
          </table>
      </div>
  </div>

  </div>
