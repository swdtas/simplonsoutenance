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
                                    <!-- SVG icon for the eye open -->
                        <svg class="eye-icon" onclick="togglePasswordVisibility()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 3c3.88 0 7.45 2.05 9.42 5.33l-1.59 1.59C18.08 7.17 15.2 5.5 12 5.5 8.42 5.5 5.5 8.42 5.5 12c0 3.68 2.83 6.67 6.42 6.98.32.05.65.02.96-.1l1.64 1.64c-1.73.61-3.58.98-5.54.98C5.39 20.5 2 17.11 2 12S5.39 3.5 10 3.5zm0 2c-2.47 0-4.69 1.28-6 3.19C6.31 8.22 8.53 7 11 7c1.77 0 3.41.77 4.54 2.01.13.17.37.19.53.04.45-.36.84-.78 1.16-1.24C16.17 8.28 14.13 7.5 12 7.5c-3.58 0-6.5 2.92-6.5 6.5s2.92 6.5 6.5 6.5 6.5-2.92 6.5-6.5c0-1.57-.59-3.02-1.57-4.14a.75.75 0 0 1-.05-.97c.38-.49.68-1.05.87-1.64C15.05 6.4 13.6 5.5 12 5.5zm0 3c1.93 0 3.5 1.57 3.5 3.5s-1.57 3.5-3.5 3.5S8.5 14.43 8.5 12 10.07 8.5 12 8.5zm0 1c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"/>
                        </svg>
                        <!-- SVG icon for the eye closed -->
                       
                         </div>
                    <div class="form-check">
                        <input id="remember_me" class="form-check-input" type="checkbox" name="remember">
                        <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                    </div>
                    <br>  
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    @endif
                    <div class="pt-2">
                        <button type="submit" name="connecter" class="btn btn-success">
                            Se connecter
                        </button>
                    </div>
                </form>
            </div>
        </div> 
    </section>
    @endsection
