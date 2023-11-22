<div class="modal fade" id="addEnterpriseModal" tabindex="-1" aria-labelledby="addEnterpriseModalLabel" aria-hidden="true">
    <div class="modal-dialog col-12">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEnterpriseModalLabel">Ajout d'une entreprise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('entreprises.store') }}" class="vstack gap-2" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="enterpriseName" class="form-label">Nom de l'entreprise <span class="text-danger" style="font-size: 1.2em;">*</span>
                            :</label>
                        <input type="text" name="nom" class="form-control" id="enterpriseName" required>
                    </div>

                    <div class="mb-3">
                        <label for="enterpriseDescription" class="form-label">Description  <span class="text-danger" style="font-size: 1.2em;">*</span>
                            :</label>
                        <textarea name="description" class="form-control" id="enterpriseDescription" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="enterpriseAddress" class="form-label">Adresse <span class="text-danger" style="font-size: 1.2em;">*</span>
                            :</label>
                        <input type="text" name="adresse" class="form-control" id="enterpriseAddress" required>
                    </div>

                    <div class="mb-3">
                        <label for="enterpriseWebsite" class="form-label"> <span class="text-danger" style="font-size: 1.2em;">*</span>
                            Site Web :</label>
                        <input type="text" name="site_web" class="form-control" id="enterpriseWebsite" required>
                    </div>

                    <div class="mb-3">
                        <label for="enterpriseCreationDate" class="form-label">Date de Création :</label>
                        <input type="date" name="date_creation" class="form-control" id="enterpriseCreationDate">
                    </div>

                    <div class="mb-3">
                        <label for="enterpriseRegion" class="form-label">Région <span class="text-danger" style="font-size: 1.2em;">*</span>
                            :</label>
                        <select name="region_id" class="form-control" id="enterpriseRegion" required>
                            <option value="" disabled selected>Sélectionnez une région</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="enterpriseLogo" class="form-label">Logo :</label>
                        <input type="file" name="logo" class="form-control" id="logo">
                    </div>

                    <!-- Formulaire de l'utilisateur -->
                    <div class="mb-3">
                        <label for="userName" class="form-label">Nom utilisateur :</label>
                        <input type="text" class="form-control" name="name" id="validationCustom01" required>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Prénom(s) utilisateur<span class="text-danger" style="font-size: 1.2em;">*</span>
                            :</label>
                        <input type="text" class="form-control" name="surname" id="validationCustom01" required>
                    </div>

                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email utilisateur <span class="text-danger" style="font-size: 1.2em;">*</span>
                            :</label>
                        <input type="email" name="email" class="form-control" id="userEmail" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <input type="hidden" name="role" value="entreprise">
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Mot de passe utilisateur <span class="text-danger" style="font-size: 1.2em;">*</span>
                            :</label>
                        <input type="password" name="password" class="form-control" id="userPassword" required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe utilisateur <span class="text-danger" style="font-size: 1.2em;">*</span>
                            :</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"  required autocomplete="new-password" required>
                    </div>

                    <button type="submit" class="btn bouton">Ajouter Entreprise</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
