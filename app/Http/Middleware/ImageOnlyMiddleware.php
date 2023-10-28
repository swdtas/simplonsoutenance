<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si le fichier est une image
        if ($request->hasFile('image_categorie')) {
            $file = $request->file('image_categorie');

            // Vérifie si le fichier est une image valide
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                return $next($request);
            }
        }

        // Si le fichier n'est pas une image, redirigez ou renvoyez une réponse d'erreur selon votre besoin
        return response()->json(['error' => 'Seules les images sont autorisées.'], 400);
    }
}
