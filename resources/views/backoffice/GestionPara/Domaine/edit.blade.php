  <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateDomainModalLabel{{ $domaine->id }}">Modifier le domaine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('domaines.update', ['domaine' => $domaine]) }}">
                        @method('PUT')
                        @csrf
                        <label for="domainName">Nom du domaine :</label>
                        <input type="text" name="nom" value="{{ old('nom') ?? $domaine->nom }}" id="domainName" required>
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


