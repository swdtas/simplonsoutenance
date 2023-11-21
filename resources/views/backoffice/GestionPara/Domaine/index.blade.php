@extends('layouts.layout.app')
@section('content')
@csrf
<div class="container-fluid p-0">
    <div class="row mb-2 text-end mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="color1"><strong>Gestion </strong> Parametres</h3>
        </div>
        @if(session()->has('success'))
    <div class="alert alert-success p-2">
        {{ session()->get('success') }}
    </div>
@endif
    </div>
    <div class="col-auto ms-auto text-end mt-n1">

    <button class="btn bouton" data-toggle="modal" data-target="#addDomainModal">
        <i class="align-middle" data-feather="plus"></i>Ajout un domaine
    </button>
    <button class="btn bouton" data-toggle="modal" data-target="#addRegionModal">
        <i class="align-middle" data-feather="plus"></i>Ajout une région
    </button>
    @include('backoffice.GestionPara.Domaine.create')
    @include('backoffice.GestionPara.Region.create')
    </div>
</div>
<div class="row">
<div class=" col-lg-6 col-xl-12 col-xxl-6 d-flex">
<div class="card-body">
    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Domaines</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($domaines as $domaine)
            <tr>
              <td>
                {{ $domaine->nom }}
              </td>
              <td>
                <button class="btn bouton" data-toggle="modal" data-target="#updateDomainModal{{ $domaine->id }}">
                    <i class="align-middle" data-feather="edit-2"></i>
                    Editer
                </button>


                {{-- <a href="{{ route('domaines.edit' , $domaine) }}"
                 class="btn btn-primary" data-toggle="modal" data-target="#addDomainModal">
                  <i class="align-middle" data-feather="edit-2"></i>
                  Editer
                </a> --}}
                <a
                data-bs-toggle="modal" data-bs-target="#defaultModalPrimary{{ $domaine->id }}"
                 class="btn btn-danger">
                  <i class="align-middle" data-feather="trash"></i>
                  Supprimer
                </a>

                <div class="modal fade" id="defaultModalPrimary{{ $domaine->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">
                          {{ $domaine->nom }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body m-3">
                        <p class="mb-0">
                          Etes vous sur de vouloir supprimer ce domaine ?
                        </p>
                      </div>
                      <form method="POST" action="{{ route('domaines.destroy' , $domaine) }}" id="form-delete-{{ $domaine->id }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                          <button type="button" class="btn btn-primary" onclick="document.getElementById('form-delete-{{ $domaine->id }}').submit()">accepter
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>

          </tr>
          <div class="modal fade" id="updateDomainModal{{ $domaine->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            @include('backoffice.GestionPara.domaine.edit')
        </div>

          @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
<div class=" col-lg-6 col-xl-12 col-xxl-6 d-flex">
    <div class="card-body">
        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Regions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regions as $region)
                <tr>
                  <td>
                    {{ $region->nom }}
                  </td>
                  <td>
                    <button class="btn bouton" data-toggle="modal" data-target="#updateRegionModal{{ $region->id }}">
                        <i class="align-middle" data-feather="edit-2"></i>
                        Editer
                    </button>
                    {{-- <a href="{{ route('regions.edit' , $region) }}"
                     class="btn btn-primary">
                      <i class="align-middle" data-feather="edit-2"></i>
                      Editer
                    </a> --}}
                    <a
                    data-bs-toggle="modal" data-bs-target="#defaultModalPrimary{{ $region->id }}"
                     class="btn btn-danger">
                      <i class="align-middle" data-feather="trash"></i>
                      Supprimer
                    </a>
                    <div class="modal fade" id="defaultModalPrimary{{ $region->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">
                              {{ $region->nom }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body m-3">
                            <p class="mb-0">
                              Etes vous sur de vouloir supprimer cette region ?
                            </p>
                          </div>
                          <form method="POST" action="{{ route('regions.destroy' , $region) }}" id="form-delete-{{ $region->id }}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                              <button type="button" class="btn btn-primary" onclick="document.getElementById('form-delete-{{ $region->id }}').submit()">accepter
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </td>

              </tr>
              <div class="modal fade" id="updateRegionModal{{ $region->id }}" tabindex="-1" role="dialog" aria-labelledby="updateRegionModalLabel{{ $region->id }}" aria-hidden="true">
                @include('backoffice.GestionPara.Region.edit')
            </div>

                @endforeach

            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>
</div>

@endsection
