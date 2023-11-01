<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bio</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontoffice.css') }}">
</head>

<body>
    <header>
        <div class="">
            <div class="row container ">
                <div class="col-md-6 container-fluid">
                    <h3>site de vente de produit bio</h3>
                </div>
                <div class="col-md-6">
            <form id="search-form" class="d-flex">
                <input type="text" name="search" placeholder="Rechercher un produit" id="search"
                    class="form-control me-2" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class=" product container pb-3 ">

            <div class="row d-flex w-100">
                <form action="{{ route('accueil') }}" method="GET">
                    <div class="form-group mt-3">
                        <label for="categorie">Filtrer par catégorie :</label>
                        <select name="categorie" id="categorie" class="form-control w-100">
                            <option value="all" {{ $selectedCategory === 'all' ? 'selected' : '' }}>Tous</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                                {{ $category->nom_categorie }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Filtrer</button>
                </form>
            </div>
            <div class="row mt-4"  id="products-container">
                @forelse($products as $key => $product)
                @if($key % 4 === 0 && $key !== 0)
            </div>
            <div class="row mt-3 p-3 ">
                @endif
                <div class="container col-md-3 mb-4 p-3" type="submit"  data-toggle="modal" data-target="#productModal{{ $product->id }}">
                    <div class="card pb-3">
                        <img src="{{ asset($product->image_product) }}" alt="{{ $product->nom_product }}" width="50">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nom_product }}</h5>
                            <p class="card-text">Prix: {{ $product->prix_product }}</p>
                            <a href="#" data-toggle="modal" data-target="#productModal{{ $product->id }}">
                                <button type="submit" class="btn btn-primary mt-2">Details</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal-->
                <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel{{ $product->id }}">Détails du produit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset($product->image_product) }}" alt="{{ $product->nom_product }}"
                                    width="150">
                                <h3>{{ $product->nom_product }}</h3>
                                <p>Prix: {{ $product->prix_product }}</p>
                                <p>Description: {{ $product->description_product }}</p>
                                <p>Catégorie: {{ $product->categorie->nom_categorie }}</p>
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
        <main>

            @include('layouts.footer')
            <script src="{{asset('js/frontoffice.js')}}"></script>
            <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('DataTables/jquery-3.6.0.min.js')}}"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

</html>