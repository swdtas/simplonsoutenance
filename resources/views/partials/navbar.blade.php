<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle">
    <ion-icon name="menu-outline" style="font-size: 2em; color: #ffffff;"></ion-icon>
  </a>
  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        <a class="nav-icon dropdown-toggle" href="index.html#" id="alertsDropdown" data-bs-toggle="dropdown">
          <div class="position-relative">
            <ion-icon name='notifications-off-circle-sharp'style="font-size: 1em; color: #ffffff;"></ion-icon>
            <span class="indicator" style="border: 1px solid #ffffff; color: #131212; background-color: #ffffff;">4</span>

          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
          <div class="dropdown-menu-header">
            4 New Notifications
          </div>


        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-icon pe-md-0 dropdown-toggle" href="index.html#" data-bs-toggle="dropdown">
            <ion-icon class="user" name="person-circle-outline" style="font-size: 2em; color: #ffffff;"></ion-icon>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a  class='dropdown-item' href='{{ route('profile.edit') }}'><i class="align-middle me-1" data-feather="user"></i> Profile</a>
          <div class="dropdown-divider">

          </div>
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
