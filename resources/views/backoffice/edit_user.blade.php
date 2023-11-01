@extends('layouts.main')
@section('body')
@csrf
<div class="container">
    <form method="POST" action="{{ route('updateUser', $user->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <div class="col-8">
            <label for="validationCustom01" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="validationCustom01" required
                value="{{ $user->name }}">
            <div class="valid-feedback">
                Veuillez entrer le nom!
            </div>
        </div>

        <div class="col-8 mt-2">
            <label for="validationCustom01" class="form-label">Prénom(s)</label>
            <input type="text" class="form-control" name="surname" id="validationCustom01" required
                value="{{ $user->surname }}">
            <div class="valid-feedback">
                Veuillez entrer le Prénom!
            </div>
        </div>
        <div class="mt-2 col-8">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ $user->email }}">
        </div>
        <div class="mt-2 col-8 input-container">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mt-4 col-8 input-container">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="flex items-center justify-end mt-2">
            <button type="submit" name="connecter" class="btn btn-success p-2">Valider</button>
        </div>
    </form>
</div>
@endsection