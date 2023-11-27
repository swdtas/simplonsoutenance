<!-- Modal -->
<div class="modal fade" id="addCandidatModal" tabindex="-1" aria-labelledby="addCandidatModalLabel" aria-hidden="true">
    <div class="modal-dialog col-12">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCandidatModalLabel">Ajout d'une offre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('candidas.store') }}" enctype="multipart/form-data"
                    class="vstack gap-2">
                    @csrf
                    <div class="form-group">
                        <label for="resume_professionnel">Résumé Professionnel:</label>
                        <textarea name="resume_professionnel" class="form-control" rows="4">{{ old('resume_professionnel') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cv">CV (PDF ou Word):</label>
                        <input type="file" name="cv" class="form-control" accept=".pdf, .doc, .docx">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">LinkedIn:</label>
                        <input type="text" name="linkedin" value="{{ old('linkedin') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="github">Github:</label>
                        <input type="text" name="github" value="{{ old('github') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="region_id">Région:</label>
                        <select name="region_id" class="form-control">
                            <option value="" disabled selected>Sélectionnez....</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="chercheur_id">Chercheur:</label>
                        <select name="chercheur_id" class="form-control">
                            <option value="" disabled selected>Sélectionnez....</option>
                            @foreach ($chercheurs->where('statut', 'valide') as $chercheur)
                                <option value="{{ $chercheur->id }}">{{ $chercheur->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="domaine_id">Domaine:</label>
                        <select name="domaine_id" class="form-control">
                            <option value="" disabled selected>Sélectionnez....</option>
                            @foreach ($domaines as $domaine)
                                <option value="{{ $domaine->id }}">{{ $domaine->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn bouton">Poster</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
