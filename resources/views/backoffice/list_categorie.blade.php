@extends('layouts.main')
@section('body')
@csrf
<!-- date table -->
<div class="container ml-3">
    <a href="{{ route('categories.create') }}" class="btn btn-success">Ajouter une catégorie</a>
</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div class="data_table">
                <table id="example" class="table pt-5 table-striped table-bordered">
                    <thead class="table color1">
                        <tr>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->nom_categorie }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0" style="background: none; border: none; cursor: pointer;">
                                            <ion-icon name="trash-outline" style="font-size: 30px; color: red;"></ion-icon>
                                    </button>
                                </form>
                                <a href="{{ route('categories.edit', $category->id) }}" class="">   <ion-icon name="eyedrop-outline" style="font-size: 30px; color:green;"></ion-icon></a>
                                <a href="#" data-toggle="modal" data-target="#categoryModal{{ $category->id }}">
                                        <ion-icon name="information-circle-outline" style="font-size: 30px; color: primary;"></ion-icon>
                                    </a>
    
                            </td>
                        </tr>
                        <!-- Modal pour les détails de la catégorie -->
                        <div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="categoryModalLabel{{ $category->id }}">Détails de la catégorie {{ $category->nom_categorie }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Contenu des détails de la catégorie ici -->
                                        <p>Nom: {{ $category->nom_categorie }}</p>
                                        <!-- Ajoutez d'autres détails de la catégorie selon votre modèle -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
