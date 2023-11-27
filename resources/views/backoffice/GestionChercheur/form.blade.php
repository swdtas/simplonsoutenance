<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-header btn-b">
            <h5 class="card-title text-center">Créer compte pour chercheur d'emploi </h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('chercheurs.store') }}" class="vstack gap-2" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="chercheurName" class="form-label">Nom <span class="text-danger" style="font-size: 1.2em;">*</span> :</label>
                            <input type="text" name="name" class="form-control" id="chercheurName" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="chercheurSurname" class="form-label">Prénom(s) <span class="text-danger" style="font-size: 1.2em;">*</span> :</label>
                            <input type="text" name="surname" class="form-control" id="chercheurSurname" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email <span class="text-danger" style="font-size: 1.2em;">*</span> :</label>
                            <input type="email" name="email" class="form-control" id="userEmail" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="chercheurAddress" class="form-label">Adresse <span class="text-danger" style="font-size: 1.2em;">*</span> :</label>
                            <input type="text" name="adresse" class="form-control" id="chercheurAddress" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="chercheurBirthDate" class="form-label">Date de naissance :</label>
                            <input type="date" name="date_naissance" class="form-control" id="chercheurBirthDate">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="chercheurGender" class="form-label">Genre :</label>
                            <select name="genre" class="form-control" id="chercheurGender">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="statut_matrimonial" class="form-label">Statut matrimonial :</label>
                            <select name="statut_matrimonial" class="form-control" id="statut_matrimonial">
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marié(e)">Marié(e)</option>
                                <option value="Divorcé(e)">Divorcé(e)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="chercheurphoto" class="form-label">Photo :</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="chercheurTelephone" class="form-label">Téléphone :</label>
                            <input type="text" name="telephone" class="form-control" id="chercheurTelephone">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Mot de passe <span class="text-danger" style="font-size: 1.2em;">*</span> :</label>
                            <input type="password" name="password" class="form-control" id="userPassword" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe <span class="text-danger" style="font-size: 1.2em;">*</span> :</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn bouton">Ajouter Chercheur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
