<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;



class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        // Vérifiez si l'utilisateur est authentifié
        if (Auth::check()) {
            return Auth::user()->hasVerifiedEmail()
                        ? redirect()->intended(RouteServiceProvider::HOME)
                        : view('auth.verify-email');
        } else {
            // L'utilisateur n'est pas authentifié, redirigez-le vers la page de connexion ou faites quelque chose d'autre
            return redirect()->route('login');
        }
    }
   
}
