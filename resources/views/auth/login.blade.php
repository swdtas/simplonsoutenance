@extends('layouts.main-login')
@section('body')
@if ($adminCount === 0)
<h5 class="alert"> Aucun administrateur n'est enregistré. Veuillez inscrire un administrateur avant de vous connecter.</h5>

    <a href="{{ route('register_admin') }}" class="btn bouton ml-5">Inscrire l'administrateur</a>

@endif

<div class="form">

	<div class="form-content">

            <div class="form-content">
            <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-info d-flex item m-5 text-center">
                <h2>Connexion</h2>
                <!-- Ajout de la classe mx-auto pour centrer l'image -->
                <img src="{{ asset('images/logo1.png') }}" width="150px" alt="" class="mx-auto">
            </div>

            <div class="email-w3l">
                    <span class="i1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    <input class="email" type="email" name="email" placeholder="Email"value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                            <div class="alert ">@lang('donnees incorrectes, veuillez vérifier à nouveau.')</div>
                    @enderror
            </div>
            <div class="pass-w3l">
			<!---728x90--->
			<span class="i2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
				<input class="pass" id="pass" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                @error('password')
                            <div class="alert alert-white">@lang('Mot de passe invalide, veuillez vérifier à nouveau.')</div>
                @enderror
			</div>
            <div class="form-check">
				<div class="left">
					<input id="remember_me" type="checkbox" value="Remember me">Se souvenir de moi
				</div>
				<div class="right">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                @endif
				</div>
				<div class="clear"></div>
			</div>
            <div class="submit-agileits">
            <input class="login" type="submit" value="Se connecter">

			</div>
        </form>
            </div>

         </div>
        </div>

    @endsection
