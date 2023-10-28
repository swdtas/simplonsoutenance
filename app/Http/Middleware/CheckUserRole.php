<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur a le rôle "user"
        if ($request->user() && $request->user()->role !== 'admin') {
            // Redirige l'utilisateur non autorisé vers une page d'erreur ou une autre route
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
