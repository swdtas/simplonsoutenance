@extends('layouts.main')
@section('body')
<div class="container mt-3">
    <div class="row justify-content-center">
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enregistrement d'une nouvelle catégorie</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nom_categorie">Nom de la catégorie</label>
                            <input id="nom_categorie" type="text" class="form-control" name="nom_categorie" required
                                autofocus>
                        </div>
                        <div class="form-group m-3">
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection