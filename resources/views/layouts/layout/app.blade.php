<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="Admin">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- Flatpickr JavaScript -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <title>recrutburkina</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/css/light.css') }}" rel="stylesheet">
  @yield('style')
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <style>
    body {
      opacity: 0;
    }

    .loader-container {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      /* Assurez-vous que le loader est au-dessus de tout le reste */
    }

    .bubble {
      position: absolute;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      box-shadow: inset 0 0 25px rgba(255, 255, 255, 0.25);
      animation: animate_4010 5s ease-in-out infinite;
    }

    .bubble:nth-child(2) {
      position: relative;
      zoom: 0.45;
      left: -10px;
      top: -100px;
      animation-delay: -4s;
    }

    .bubble:nth-child(3) {
      position: relative;
      zoom: 0.45;
      right: -80px;
      top: -300px;
      animation-delay: -6s;
    }

    .bubble:nth-child(4) {
      position: relative;
      zoom: 0.35;
      left: -120px;
      bottom: -200px;
      animation-delay: -1s;
    }

    .bubble:nth-child(5) {
      position: relative;
      zoom: 0.5;
      left: 0px;
      top: 200px;
      animation-delay: -1s;
    }

    @keyframes animate_4010 {
      0%, 100% {
        transform: translateY(0%);
        transform: translateX(0%);
      }

      50% {
        transform: translateY(100%);
        transform: translateX(100%);
      }
    }

    .bubble::before {
      content: '';
      position: absolute;
      top: 50px;
      left: 45px;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: #fff;
      z-index: 10;
      filter: blur(2px);
    }

    .bubble::after {
      content: '';
      position: absolute;
      top: 80px;
      left: 80px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #fff;
      z-index: 10;
      filter: blur(2px);
    }

    .bubble span {
      position: absolute;
      border-radius: 50%;
    }

    .bubble span:nth-child(1) {
      inset: 10px;
      border-left: 15px solid #0f4fff;
      filter: blur(8px);
    }

    .bubble span:nth-child(2) {
      inset: 10px;
      border-right: 15px solid rgb(233, 68, 255);
      filter: blur(8px);
    }

    .bubble span:nth-child(3) {
      inset: 10px;
      border-top: 15px solid #34099a;
      filter: blur(8px);
    }

    .bubble span:nth-child(4) {
      inset: 30px;
      border-left: 15px solid #b444ff;
      filter: blur(12px);
    }

    .bubble span:nth-child(5) {
      inset: 10px;
      border-bottom: 10px solid #fff;
      filter: blur(8px);
      transform: rotate(360deg);
    }
  </style>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
  <div class="loader-container">
    <div class="container">
      <div class="bubble">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="bubble">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="bubble">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="bubble">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="bubble">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <div class="wrapper">
    @include('partials.sidebar')
    <div class="main">
      @include('partials.navbar')
      <main class="content">
        @yield('content')
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
