@extends('layouts.main-login')
@section('body')
<section class="container  mt-5 pb-3">
        @if ($adminCount === 0)
                <!-- Afficher l'alerte si aucun administrateur n'est enregistré -->
                <div class="alert alert-warning">
                   <h5> Aucun administrateur n'est enregistré. Veuillez inscrire un administrateur avant de vous connecter.</h5>
                    <a href="{{ route('register_admin') }}" class="btn btn-success ml-5">Inscrire l'administrateur</a>
                </div>
         @endif
        <div class="row d-flex page_login">
            <div class="container pt-3 col-lg-8">
                <img src="{{ asset('images/image2.jpg') }}" width="400px" alt="logo" class="img-fluid">
            </div>
            <div class="container pt-5 col-lg-4">   
                <h3>Veuillez vous identifier</h3>
                <form method="post" action="{{ route('login') }}" class="pt-5">
                    @csrf
                    <div class="input-container">
                        <input  placeholder="votre email"  id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                            <div class="alert alert-danger">@lang('donnees incorrectes, veuillez vérifier à nouveau.')</div>
                        @enderror
                    </div>
                    <br>
                    <div class="input-container d-flex">
                        <input placeholder="votre mot de passe"  id="pass" class="form-control" type="password" name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="alert alert-danger">@lang('Mot de passe invalide, veuillez vérifier à nouveau.')</div>
                        @enderror
                       
                         </div>
                    <div class="form-check">
                        <input id="remember_me" class="form-check-input" type="checkbox" name="remember">
                        <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                    </div>
                    <br>  
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}" id="isUsernamePasswordvalid" >Mot de passe oublié ?</a>
                    @endif
                    <div class="pt-2">
                        <button type="submit" name="connecter" class="btn btn-success" id="mousemove">
                            Se connecter
                        </button>
                    </div>
                </form>
            </div>
        </div> 
    </section>
    @endsection
