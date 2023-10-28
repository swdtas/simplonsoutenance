@extends('layouts.main')
@section('body')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enregistrement d'une nouveau produit</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}"  enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group">
                            <label for="nom_product">Nom du produit</label>
                            <input id="nom_product" type="text" class="form-control" name="nom_product" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for=" prix_product">Prix du produit</label>
                            <input id=" prix_product" type="text" class="form-control" name=" prix_product" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="description_product">Description du produit</label>
                            <textarea id="description_product" class="form-control" name="description_product" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image_product">Image du produit</label>
                            <input id="image_product" type="file" class="form-control" name="image_product">
                           
                        </div>
                        <div class="form-group">
                            <label for="categorie_id">Catégorie du produit</label>
                            <select class="form-control" name="categorie_id">
                            <option value="" disabled selected>Sélectionnez une categorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nom_categorie }}</option>
                                @endforeach
                            </select>
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
