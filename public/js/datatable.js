$(document).ready(function(){
    
    var table = $('#example').DataTable({
        
        buttons:['copy', 'csv', 'excel', 'pdf', 'print']
        
    });
    
    
    table.buttons().container()
    .appendTo('#example_wrapper .col-md-6:eq(0)');

});

// modal
// Attachez un gestionnaire d'événements de clic aux boutons "Détail"
$(document).on('click', '.detail-btn', function () {
    // Obtenez l'ID de l'utilisateur associé au bouton cliqué
    var userId = $(this).data('user-id');
    
    // Affichez la fenêtre modale correspondante en utilisant l'ID de l'utilisateur
    $('#userDetailModal' + userId).modal('show');
});