<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recrutburkina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
</head>
    <body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
        <div class="wrapper">
            @include('layouts.navbar-front')
            <div class="main">

                <main class="content">
                  @yield('main')
                </main>
                <footer class="footer">
                    <div class="container-fluid">
                      <div class="row text-muted">
                        <div class="col-12 text-center">
                          <p class="mb-0">
                            <a href="" target="_blank" class="text-muted"><strong>Copyright © RecrutBurkina 2023</strong></a>
                          </p>
                        </div>
                        <div class="col-6 text-end">
                        </div>
                      </div>
                    </div>
                  </footer>
                </div>
              </div>

              <script src="{{ asset('assets/js/app.js') }}"></script>
              <script src="{{ asset('assets/js/datatables.js') }}"></script>
              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
              <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

              <script>
                document.addEventListener("DOMContentLoaded", function () {
                  $("#datatables-reponsive").DataTable({
                    responsive: true,
                    //changer le message de la pagination
                    "language": {
                      "paginate": {
                        "previous": "Précédent",
                        "next": "Suivant"
                      },
                      "search": "Rechercher",
                      "lengthMenu": "Afficher _MENU_ éléments",
                      "zeroRecords": "Aucun élément trouvé",
                      "info": "Page _PAGE_ sur _PAGES_",
                    },
                    // Ajoutez les boutons
                    dom: 'Bfrtip',
                    buttons: [
                       'excel', 'pdf'

                    ]
                  });
                });
              </script>
              <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
              <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
              <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
              <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
              <script src="{{asset('js/main.js')}}"></script>

              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            </body>
            </html>
