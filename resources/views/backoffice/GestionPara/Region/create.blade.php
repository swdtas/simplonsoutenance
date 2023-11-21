
<div class="modal fade" id="addRegionModal" tabindex="-1" aria-labelledby="addRegionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRegionModalLabel">Ajout d'une région</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body @error('nom') modal-error @enderror">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="post" action="{{ route('regions.store') }}">
                    @method('POST')
                    @csrf
                    <label for="regionName">Nom de la région :</label>
                    <input type="text" name="nom" id="regionName" required>
                    @error('nom')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                    <button type="submit" class="btn btn-success">Ajouter Région</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Écoutez l'événement de fermeture du modal
        $('#addRegionModal').on('hidden.bs.modal', function () {
            // Vérifiez s'il y a des erreurs de validation dans le formulaire
            if ($('.modal-body').hasClass('modal-error')) {
                // Réouvrez le modal en cas d'erreur
                $(this).modal('show');
            }
        });
    });
</script>
