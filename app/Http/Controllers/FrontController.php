<?php

namespace App\Http\Controllers;

use App\Models\Candida;
use App\Models\Chercheur;
use App\Models\Domaine;
use App\Models\Entreprise;
use App\Models\Offres;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function RegisterEntreprise()
    {
        $regions=Region::all();
        $entreprises =Entreprise::all();
        return view('frontoffice.enregistrement-entreprise' ,['title' => 'Ajouter une une' , 'entreprises' => $entreprises,'regions' => $regions]);
    }


    public function showAccueil()
    {
        $user = User::all();
        $domaines = Domaine::all();
        $regions = Region::all();
        $chercheur = Chercheur::all();

        // Modification pour récupérer les 3 derniers candidats
        $derniersCandidats = Candida::latest()->take(3)->get();

        $entreprisesValides = Entreprise::where('statut', 'valide')->get();
        $dernieresEntreprises = Entreprise::where('statut', 'valide')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('frontoffice.accueil', [
            'entreprisesValides' => $entreprisesValides,
            'dernieresEntreprises' => $dernieresEntreprises,
            'candidats' => $derniersCandidats, // Utilisation des 3 derniers candidats
            'regions' => $regions,
            'domaines' => $domaines,
            'chercheur' => $chercheur,
            'user' => $user
        ]);
    }




    public function showOffre(Request $request)
    {
        $regions = Region::all();
        $entreprises = Entreprise::all();
        $keyword = $request->input('keyword');
        $selectedRegion = $request->input('region');
        $query = Offres::with('entreprise')->latest();
        if ($keyword) {
            $query->where('titre', 'like', '%' . $keyword . '%')
                  ->orWhere('description', 'like', '%' . $keyword . '%')
                  ->orWhere('profile', 'like', '%' . $keyword . '%');
        }

        // Filtrer par région sélectionnée
        if ($selectedRegion) {
            $query->whereHas('entreprise', function ($q) use ($selectedRegion) {
                $q->where('region_id', $selectedRegion);
            });
        }
        $offres = $query->paginate(10);
        return view('frontoffice.offre', [
            'title' => 'Ajouter une offre',
            'entreprises' => $entreprises,
            'offres' => $offres,
            'regions' => $regions,
        ]);
    }


    public function showentreprise()
    {
        $entreprisesValides = Entreprise::where('statut', 'valide')->get();
        return view('frontoffice.entreprise', [
            'entreprisesValides' => $entreprisesValides,
        ]);

    }



public function showCandidat(Request $request)
{
    $users = User::all();
    $domaines = Domaine::all();
    $chercheurs = Chercheur::all();
    $regions=Region::all();

    // Récupération de la région depuis la requête
    $regionId = $request->input('region_id');

    // Requête de base pour récupérer tous les candidats
    $query = Candida::query();

    // Si une région est spécifiée dans la requête, filtrez les candidats en fonction de cette région
    if ($regionId) {
        $query->whereHas('region', function ($query) use ($regionId) {
            $query->where('id', $regionId);
        });
    }

    // Récupération des candidats en fonction de la recherche
    $candidats = $query->get();

    // Passer les données à la vue
    return view('frontoffice.candidat', [
        'candidats' => $candidats,
        'domaines' => $domaines,
        'chercheurs' => $chercheurs,
        'users' => $users,
        'regions' => $regions,
        'selectedRegion' => $regionId, // Passer la région sélectionnée à la vue pour maintenir l'état du formulaire
    ]);
}


    public function confirmation()
    {
        return view('frontoffice.confirmation');
    }

    public function RegisterChercheur()
    {
        $chercheurs = Chercheur::all();
        return view('frontoffice.enregistrement-chercheur', ['title' => 'creer compte chercheur emploi', 'chercheurs' => $chercheurs]);

    }
}
