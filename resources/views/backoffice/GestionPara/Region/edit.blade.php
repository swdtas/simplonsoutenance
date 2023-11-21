
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateRegionModalLabel{{ $region->id }}">Modifier la région</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('regions.update', ['region' => $region]) }}">
                        @method('PUT')
                        @csrf
                        <label for="regionName">Nom de la région :</label>
                        <input type="text" name="nom" value="{{ old('nom') ?? $region->nom }}" id="regionName" required>
                        @error('nom')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
