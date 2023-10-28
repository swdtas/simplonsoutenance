<section>
    <header class="mb-4">
        <h2 class="text-lg font-medium text-gray-900">
            Mettre à Jour le Mot de Passe
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.
        </p>
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
