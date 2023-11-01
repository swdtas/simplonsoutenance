@extends('layouts.main')

@section('body')
<div class="">
    <div class="col offset-1">
        <h1 class="message">BIENVENUE SUR BIO</h1>
        <div class="text-dark">
            Plongez dans l'expérience d'un mode de vie plus sain. Bienvenue dans notre univers bio, où chaque achat
            soutient votre bien-être et notre planète.
        </div>
    </div>
</div>

<div class="cardBox">
    <div class="card1 m-3">
        <div>
            <div>
                <p>Nombre de catégories disponibles : {{ $numberOfCategories }}</p>
            </div>
        </div>
    </div>
    <div class=" m-3 row d-flex flex-wrap">
        @forelse($categories as $category)
        <div class=" col-3 cardBox ">
            <div class="card1">
                <div>
                    <div class="cardName">
                        <p>{{ $category->nom_categorie }}</p>
                    </div>
                    <div class="category">
                        <p>Nombre de produits : {{ $productsCountByCategory[$category->id] }}</p>
                    </div>
                </div>
            </div>
        </div>
        @if($loop->iteration % 4 === 0)
    </div>
    <div class="d-flex flex-wrap">
        @endif
        @empty
        <div class="col-12">
            <p>Aucun produit disponible pour cette catégorie.</p>
        </div>
        @endforelse
    </div>

    @endsection