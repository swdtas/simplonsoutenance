<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ting - Biissi - Zaaka</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontoffice.css') }}">
</head>

<body>
    <header>
        <h1>Magasin Bio en Ligne</h1>
    </header>

    <main>
        <div class="container pb-3">
            <div class="row">
                <form action="{{ route('accueil') }}" method="GET">
                    <div class="form-group">
                        <label for="categorie">Filtrer par catégorie :</label>
                        <select name="categorie" id="categorie" class="form-control">
                            <option value="all" {{ $selectedCategory === 'all' ? 'selected' : '' }}>Tous</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                                    {{ $category->nom_categorie }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Filtrer</button>
                </form>
            </div>

            <div class="row mt-4">
                @forelse($products as $key => $product)
                    @if($key % 4 === 0 && $key !== 0)
                        </div><div class="row mt-4">
                    @endif
                    <div class="container col-md-3 mb-4 p-3">
                        <div class="card">
                            <img src="{{ asset($product->image_product) }}" alt="{{ $product->nom_product }}" width="50">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nom_product }}</h5>
                                <p class="card-text">Prix: {{ $product->prix_product }}</p>
                                <a href="#" data-toggle="modal" data-target="#productModal{{ $product->id }}">
                                    Voir les détails
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal pour les détails du produit -->
                    <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel{{ $product->id }}">Détails du produit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($product->image_product) }}" alt="{{ $product->nom_product }}" width="150">
                                    <h3>{{ $product->nom_product }}</h3>
                                    <p>Prix: {{ $product->prix_product }}</p>
                                    <p>Description: {{ $product->description_product }}</p>
                                    <p>Catégorie: {{ $product->categorie->nom_categorie }}</p>
                                    <!-- Ajoutez d'autres détails du produit ici -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>Aucun produit disponible pour cette catégorie.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Ting Biissi Zaaka - Magasin Bio en Ligne. Tous droits réservés.</p>
    </footer>
    
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('DataTables/jquery-3.6.0.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
