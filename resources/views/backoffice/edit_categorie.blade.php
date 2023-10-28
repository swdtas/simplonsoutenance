@extends('layouts.main')
@section('body')
@csrf
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h2>Modifier la Catégorie</h2>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nom_categorie">Nom de la Catégorie :</label>
                    <input type="text" class="form-control" id="nom_categorie" name="nom_categorie" value="{{ old('nom_categorie', $category->nom_categorie) }}">
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>

        </div>
    </div>
</div>
@endsection
