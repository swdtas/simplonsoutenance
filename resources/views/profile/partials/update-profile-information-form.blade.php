<section>
    <header class="mb-4">
        <div class="container-fluid p-0">
            <div class="row mb-2 text-end mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3 class="color1"><strong> Informations du</strong>   Profil</h3>
                </div>
            </div>
        <h4 class="mt-1  text-dark text-gray-900">
            Mettez à jour les informations de votre compte et votre adresse e-mail.
        </h4>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            <div class="invalid-feedback">
                @foreach ($errors->get('name') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Nom</label>
            <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname', $user->surname) }}" required autofocus autocomplete="surname">
            <div class="invalid-feedback">
                @foreach ($errors->get('surname') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            <div class="invalid-feedback">
                @foreach ($errors->get('email') as $error)
                    {{ $error }}<br>
                @endforeach
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800">
                        Votre adresse e-mail n'est pas vérifiée.
                        <button form="send-verification" class="btn btn-link p-0">
                            Cliquez ici pour renvoyer l'e-mail de vérification.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">Enregistrer</button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-success">Enregistré.</p>
            @endif
        </div>
    </form>
</section>
