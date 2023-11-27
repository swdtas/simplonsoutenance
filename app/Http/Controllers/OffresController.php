<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Offres;
use App\Http\Requests\StoreOffresRequest;
use App\Http\Requests\UpdateOffresRequest;
use App\Models\Domaine;
use App\Models\Entreprise;

class OffresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // OffresController.php

   public function index()
   {
       $domaines = Domaine::all();
       $user = auth()->user();
       $offres = collect();
       $entreprises = Entreprise::all();

       switch (true) {
           case ($user->role == 'entreprise' && $user->entreprise):
               // Récupérer les offres de l'entreprise connectée
               $offres = $user->entreprise->offres;
               break;

           case ($user->role == 'admin' || $user->role == 'user'):
               // Récupérer toutes les offres pour les rôles admin et user
               $offres = Offres::all();
               break;

           default:
               // Gérer le cas par défaut si nécessaire
               break;
       }

       return view('backoffice.GestionOffre.index', [
           'title' => 'Créer compte entreprise',
           'offres' => $offres,
           'entreprises' => $entreprises,
           'domaines' => $domaines,
       ]);
   }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOffresRequest $request)
        {
            $inputs = $request->validated();
            Offres::create($inputs);
            return redirect()->route('offres.index')->with('success', 'Offres poster avec succès !');
        }





    /**
     * Display the specified resource.
     */
    public function show(Offres $offres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offres $offres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOffresRequest $request, Offres $offres)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offres $offre)
    {

        $offre->delete();
        return back() ->with('success','Entreprise supprimée avec succès.');

    }
    // OffreController.php



public function today()
{
    // Sélectionnez uniquement les offres du jour
    $offres =Offres::whereDate('created_at', now()->toDateString())->get();

    return view('backoffice.GestionOffre.today', compact('offres'));
}

}
