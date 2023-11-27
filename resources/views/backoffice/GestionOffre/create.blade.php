
<!-- Modal -->
<div class="modal fade" id="addOfferModal" tabindex="-1" aria-labelledby="addOfferModalLabel" aria-hidden="true">
    <div class="modal-dialog col-12">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOfferModalLabel">Ajout d'une offre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('offres.store') }}" class="vstack gap-2">
                    @csrf

                    <div class="mb-3">
                        <label for="offerTitle" class="form-label">Titre de l'offre :</label>
                        <input type="text" name="titre" class="form-control" id="offerTitle" required>
                    </div>

                    <div class="mb-3">
                        <label for="offerDescription" class="form-label">Description de l'offre :</label>
                        <textarea name="description" class="form-control" id="offerDescription" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="offerProfile" class="form-label">Profil recherché :</label>
                        <input type="text" name="Profile" class="form-control" id="offerProfile" required>
                    </div>

                    <!-- Sélection de l'entreprise -->
                    <div class="mb-3">
                        <label for="offerEnterprise" class="form-label">Entreprise :</label>
                        <select name="entreprise_id" class="form-control" id="offerEnterprise" required>
                            <option value="" disabled selected>Sélectionnez une entreprise</option>
                            @foreach ($entreprises as $entreprise)
                                <option value="{{ $entreprise->id }}">{{ $entreprise->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn bouton">Poster une Offre</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
