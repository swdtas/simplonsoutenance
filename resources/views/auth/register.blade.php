@extends('layouts.layout.app')
@section('content')
<div class="container  ">
    <div class="row mb-2 text-end mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="color1"><strong>Enregistrement </strong>Utilisateur</h3>
        </div>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div class="col-8">
            <label for="validationCustom01" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="validationCustom01" required>
            <div class="valid-feedback">
            veuillez entrer le nom!
            </div>
        </div>
      <!-- surame -->
        <div class="col-8">
    <label for="validationCustom01" class="form-label">Prénom(s)</label>
    <input type="text" class="form-control" name="surname" id="validationCustom01" required>
    <div class="valid-feedback">
    veuillez entrer le Prénom!
    </div>
  </div>

        <!-- Email Address -->


        <div class="mt-2 col-8">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-2  col-8 input-container">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"  class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4  col-8 input-container">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"  class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-2">
            <button type="submit" class="btn btn-primary">   <i class="align-middle" data-feather="check-circle"></i>Enregistrer</button>
        </div>
    </form>

    </div>
@endsection
