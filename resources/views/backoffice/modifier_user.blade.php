@extends('layouts.main')
@section('body')
<div class="container  ">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div class="col-8">
            <label for="validationCustom01" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="validationCustom01" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            <div class="valid-feedback">
            Nom
            </div>
        </div>
      <!-- surame -->
        <div class="col-8">
        <label for="validationCustom01" class="form-label">Prénom(s)</label>
        <input type="text" class="form-control" name="surname" id="validationCustom01" value="{{ old('name', $user->surname) }}" required autofocus autocomplete="surname">
        <div class="valid-feedback">
    veuillez entrer le Prénom!
    </div>
  </div>

        <!-- Email Address -->
          

        <div class="mt-2 col-8">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" value="{{ old('name', $user->email) }}" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

       

        <div class="flex items-center justify-end mt-2">
            <button type="submit" name="connecter" class="btn btn-success p-2 ">
             Valider
             </button>
        </div>
    </form>

    </div>
@endsection
