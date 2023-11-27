@extends('layouts.layout.app')
@section('content')

<div class="container-fluid p-0">

    <div class="row mb-2 text-end mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="color1"><strong>Tableau de </strong> Bord</h3>
        </div>
    </div>

  <div class="row">
    <div class="col-xl-6 col-xxl-6 d-flex">
      <div class="w-100">
        <div class="row">
          <div class="col-sm-6">
            <div class="card cardBox">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <p class="card-tite">Les Offres du Jour</p>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
                <h1 class="mt-1 mb-3 text-info">2.382</h1>
                <div class="mb-0">
                  <span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i>#
                  </span>
                  <span class="text-muted"></span>
                </div>
              </div>
            </div>
            <div class="card cardBox">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <p class=" card-tite">Chercheurs d'emploi</p>
                  </div>
                  <div class="col-auto">
                  </div>
                </div>
                <h1 class="mt-1 text-info mb-3">14.212</h1>
                <div class="mb-0">
                    <span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i>#
                    </span>
                    <span class="text-muted"></span>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card cardBox">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <p class="card-tite">Candidats du Jour</p>
                  </div>
                  <div class="col-auto">
                  </div>
                </div>
                <h1 class="mt-1 text-info mb-3">$21.300</h1>
                <div class="mb-0">
                    <span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i>#
                    </span>
                    <span class="text-muted"></span>
                  </div>
              </div>
            </div>
            <div class="card cardBox">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <p class="card-titel">Entrepises</p>
                  </div>

                  <div class="col-auto">

                  </div>
                </div>
                <h1 class="mt-1 text-info  mb-3">64</h1>
                <div class="mb-0">
                    <span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i>#
                    </span>
                    <span class="text-muted"></span>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-xxl-6 d-flex order-2 order-xxl-1">
        @include('backoffice.GestionUser.calendar')
    </div>
  </div>
</div>
@endsection
