<section class="space-y-6">
    <header>
        <h3 class="text-lg font-medium text-gray-600 dark:text-gray-100">
            {{ __('Supprimer le compte') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.") }}
        </p>
    </header>

    <button type="button" class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#confirm-user-deletion-modal"
    >{{ __('Supprimer le compte') }}</button>

    <div class="modal fade p-3" id="confirm-user-deletion-modal" tabindex="-1" aria-labelledby="confirm-user-deletion-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
                    </h4>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                        {{ __("Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.") }}
                    </p>

                    <div class="mt-6">
                        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Mot de passe') }}" required>

                        <div class="invalid-feedback">
                            @foreach ($errors->userDeletion->get('password') as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-danger ms-3">{{ __('Supprimer le compte') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
