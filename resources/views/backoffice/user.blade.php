@extends('layouts.main')
@section('body')
@csrf
   <!-- date table -->
   <div class="container ml-3">
   
   <a href="{{ route('register') }}">
   <button type="submit" class="btn btn-success"><ion-icon class="ml-3" name='person-add-outline'></ion-icon>ajouter un utilisateur</button>
   </a>
   </div>
   <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table pt-5 table-striped table-bordered">
                        <thead class="table  color1 ">
                            <tr>
                                <th>Nom</th>
                                <th>Prénom(s)</th>
                                <th>Email</th>
                                <th>Rôle</th>  
                                <th>Action</th>                                  
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                                <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#userDetailModal{{ $user->id }}">Détail</button>
                                <a href="{{ route('deleteUser', ['id' => $user->id]) }}" onclick="event.preventDefault(); if(confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) document.getElementById('delete-form-{{ $user->id }}').submit();">
                                    Supprimer
                                </a>

                                <form id="delete-form-{{ $user->id }}" action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
