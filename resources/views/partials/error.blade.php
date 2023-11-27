@if(session()->has('error'))
    <div id="errorImageModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="https://th.bing.com/th/id/OIP.AZtCouqFM407ihpTdUcjewHaGL?w=207&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7" alt="Image d'erreur" class="img-fluid r" style="max-width: 100%; max-height: 100vh;">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#errorImageModal').modal('show');
            setTimeout(function(){
                $('#errorImageModal').modal('hide');
            }, 2000);
        });
    </script>
@endif
