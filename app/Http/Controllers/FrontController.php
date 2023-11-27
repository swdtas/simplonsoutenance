<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Offres;
use App\Models\Region;
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

        $entreprisesValides = Entreprise::where('statut', 'valide')->get();
        $dernieresEntreprises = Entreprise::where('statut', 'valide')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('frontoffice.accueil', [
            'entreprisesValides' => $entreprisesValides,
            'dernieresEntreprises' => $dernieresEntreprises,
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

    public function showCandidat()
    {
        return view('frontoffice.candidat');
    }


}
