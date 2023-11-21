<section>
    <header class="mb-4 mt-2">
        <div class="row mt-2 mb-2 text-end mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3 class="color1"><strong> Mettre à Jour le </strong> Mot de Passe</h3>
            </div>
        </div>

        <h4 class="mt-2 text-sm text-gray-600">
            Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.
        </h4>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="form-label">Mot de Passe Actuel</label>
            <input type="password" id="current_password" name="current_password" class="form-control" autocomplete="current-password">
            <div class="invalid-feedback">
                @foreach ($errors->updatePassword->get('current_password') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nouveau Mot de Passe</label>
            <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">
            <div class="invalid-feedback">
                @foreach ($errors->updatePassword->get('password') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le Nouveau Mot de Passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password">
            <div class="invalid-feedback">
                @foreach ($errors->updatePassword->get('password_confirmation') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">Enregistrer</button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-success">Enregistré.</p>
            @endif
        </div>
    </form>
</section>
