@extends('layouts.main')
@section('body')
@csrf
<form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Ajoutez les champs de modification ici -->
    <div class="form-group">
        <label for="nom_product">Nom du produit :</label>
        <input type="text" class="form-control" id="nom_product" name="nom_product" value="{{ old('nom_product', $product->nom_product) }}" required>
    </div>
    <div class="form-group">
        <label for="prix_product">Prix du produit :</label>
        <input type="text" class="form-control" id="prix_product" name="prix_product" value="{{ old('prix_product', $product->prix_product) }}" required>
    </div>
    <div class="form-group">
        <label for="description_product">Description du produit :</label>
        <textarea class="form-control" id="description_product" name="description_product" rows="4">{{ old('description_product', $product->description_product) }}</textarea>
    </div>
    <div class="form-group">
        <label for="image_product">Image du produit :</label>
        <input type="file" class="form-control" id="image_product" name="image_product">
    </div>
    <div class="form-group">
        <label for="categorie_id">Catégorie du produit :</label>
        <select class="form-control" id="categorie_id" name="categorie_id">
            <option value="" disabled>Sélectionnez une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('categorie_id', $product->categorie_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->nom_categorie }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Modifier le produit</button>
</form>
@endsection
