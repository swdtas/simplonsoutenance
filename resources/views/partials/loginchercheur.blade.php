
<div class="modal fade" id="loginModal1" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mr-2" style="max-height: 60px;">
                <h5 class="modal-title" id="loginModalLabel">Espace Chercheur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-6">
                            <img src="{{ asset('images/cover21.png') }}" alt="Image du Modal" class="img-fluid">
                        </div>

                        <div class="col-6 mt-5">
                            <h2 class="color1">Connectez-vous </h2>
                            <form class="mt-5" role="form" method="post" action="{{ route('login') }}}">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username" id="username">
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                    <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                                </div>
                                <div class="text-start">
                                    <button class="btn btn-bg w-50" type="submit">Se connecter</button>
                                    <h3 class="mb-0">Avez-vous un compte ? <a href="{{ route('chercheurs.create') }}">Inscrivez-vous ici</a></h3>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-left">
                    &copy; Copyright <strong><span>recrutburkina</span></strong>. All Rights Reserved
                  </div>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

