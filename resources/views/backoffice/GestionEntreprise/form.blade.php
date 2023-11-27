<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-header btn-b">
            <h5 class="card-title text-center">Créer compte Entreprise </h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('entreprises.store') }}" class="vstack gap-2"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseName" class="form-label">Nom de l'entreprise <span class="text-danger"
                                    style="font-size: 1.2em;">*</span>
                                :</label>
                            <input type="text" name="nom" class="form-control" id="enterpriseName" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseWebsite" class="form-label"> <span class="text-danger"
                                    style="font-size: 1.2em;">*</span>
                                Site Web :</label>
                            <input type="text" name="site_web" class="form-control" id="enterpriseWebsite" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseAddress" class="form-label">Adresse <span class="text-danger"
                                    style="font-size: 1.2em;">*</span>
                                :</label>
                            <input type="text" name="adresse" class="form-control" id="enterpriseAddress" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseCreationDate" class="form-label">Date de Création :</label>
                            <input type="date" name="date_creation" class="form-control" id="enterpriseCreationDate">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseRegion" class="form-label">Région <span class="text-danger"
                                    style="font-size: 1.2em;">*</span>
                                :</label>
                            <select name="region_id" class="form-control" id="enterpriseRegion" required>
                                <option value="" disabled selected>Sélectionnez une région</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="enterpriseLogo" class="form-label">Logo :</label>
                            <input type="file" name="logo" class="form-control" id="logo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="enterpriseDescription" class="form-label">Description <span class="text-danger"
                                style="font-size: 1.2em;">*</span>
                            :</label>
                        <textarea name="description" class="form-control" id="enterpriseDescription" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Nom utilisateur :</label>
                            <input type="text" class="form-control" name="name" id="validationCustom01" required>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Prénom(s) utilisateur<span
                                    class="text-danger" style="font-size: 1.2em;">*</span>
                                :</label>
                            <input type="text" class="form-control" name="surname" id="validationCustom01" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email utilisateur <span class="text-danger"
                                    style="font-size: 1.2em;">*</span>
                                :</label>
                            <input type="email" name="email" class="form-control" id="userEmail" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="hidden" name="role" value="entreprise">
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Mot de passe utilisateur <span
                                    class="text-danger" style="font-size: 1.2em;">*</span>
                                :</label>
                            <input type="password" name="password" class="form-control" id="userPassword" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe
                                utilisateur <span class="text-danger" style="font-size: 1.2em;">*</span>
                                :</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" required autocomplete="new-password" required>
                        </div>
                    </div>
                </div>
               <button type="submit" class="btn bouton">Ajouter Entreprise</button>
            </form>
        </div>
    </div>
</div>
