<nav class="navbar navbar-expand navbar-light navbar-bg">
    <div class="navbar-collapse collapse">
      <ul class="navbar-nav navbar-align">

        <li class="nav-item dropdown">
          <a class="nav-icon pe-md-0 dropdown-toggle" href="index.html#" data-bs-toggle="dropdown">
              <ion-icon class="user" name="person-circle-outline" style="font-size: 2em; color: #ffffff;"></ion-icon>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
           
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Déconnexion</a>

          </div>
        </li>
        <li  class="nav-item dropdown">
          {{ Auth::user()->name }} <br>
          {{ Auth::user()->role }}
        </li>
      </ul>
    </div>
  </nav>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmation de déconnexion</h5>

          </div>
          <div class="modal-body">
            Êtes-vous sûr de vouloir vous déconnecter ?
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
               <form method="POST" action="{{ route('logout') }}">
                  @csrf
               <button type="submit" class="btn btn-danger">Déconnexion</button>
              </form>
          </div>
      </div>
  </div>
  </div>
