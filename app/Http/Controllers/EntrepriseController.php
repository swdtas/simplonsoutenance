<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Http\Requests\StoreEntrepriseRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */




// ...

public function index()
{
    $user = Auth::user();

    // Si l'utilisateur est un admin, afficher toutes les données
    if ($user->role === 'admin') {
        $regions = Region::all();
        $entreprises = Entreprise::all();
        return view('backoffice.GestionEntreprise.index', ['title' => 'Ajouter une entreprise', 'entreprises' => $entreprises, 'regions' => $regions]);
    }

    // Si l'utilisateur est une entreprise, afficher seulement ses données
    elseif ($user->role === 'entreprise') {
        $regions = Region::all();
        $entreprises = Entreprise::where('user_id', $user->id)->get();
        return view('backoffice.GestionEntreprise.index', ['title' => 'Vos données', 'entreprises' => $entreprises, 'regions' => $regions]);
    }

    // Gérer d'autres rôles si nécessaire
    else {
        return redirect('/')->with('error', 'Vous n\'avez pas les autorisations nécessaires.');
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions=Region::all();
        $entreprises =Entreprise::all();
        $regions=Region::all();
        $entreprises =Entreprise::all();
        return view('backoffice.GestionEntreprise.create',  ['title' => 'Ajouter une une' , 'entreprises' => $entreprises,'regions' => $regions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntrepriseRequest $request)
    {
       try {
        $user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'entreprise',
        ]);
        $statut = 'en attente';
        $logo = $request->file('logo');
        $logoName = null;

        if ($logo) {
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('public/logos', $logoName);
        }

        Entreprise::create([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'adresse' => $request->input('adresse'),
            'site_web' => $request->input('site_web'),
            'date_creation' => $request->input('date_creation'),
            'region_id' => $request->input('region_id'),
            'logo' => $logoName,
            'statut' => $statut,
            'user_id' => $user->id,
        ]);

        if (Auth::check()) {
            return redirect()->route('entreprises.index')->with('success', 'Compte créé avec succès.');
        } else {
            return redirect()->route('confirmation')->with('success', 'Compte créé avec succès.');
        }
       } catch (\Exception $e) {
           return redirect()->route('entreprises.index')->with('error', 'Échec de l\'enregistrement : ' . $e->getMessage());
       }
    }



    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        $regions = Region::all();

        return view('backoffice.GestionEntreprise.edit', [
            'title' => 'Editer une entreprise',
            'entreprise' => $entreprise,
            'regions' => $regions
        ]);
    }


    /**
     * Update the specified resource in storage.
     */


public function update(UpdateEntrepriseRequest $request, Entreprise $entreprise)
{

    $entreprise->update([
        'nom' => $request->nom,
        'site_web' => $request->site_web,
        'adresse' => $request->adresse,
        'date_creation' => $request->date_creation,
        'region_id' => $request->region_id,
        'description' => $request->description,
    ]);


    if ($request->hasFile('logo')) {

    } elseif ($request->has('keepLogo')) {

    }
    return redirect()->route('entreprises.index')->with('success', 'Modification Success');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();
        return back() ->with('success','ENTREPRISE supprimée avec succès.');
    }
    public function attente()
    {
        // Mettez à jour le statut de l'entreprise à 'valide' par exemple
        $regions=Region::all();
        $entreprises =Entreprise::all();
        return view('backoffice.GestionEntreprise.attente',  ['title' => 'Validation entreprise' , 'entreprises' => $entreprises,'regions' => $regions]);
    }
    public function refuser()
    {
        $regions=Region::all();
        $entreprises =Entreprise::all();
        return view('backoffice.GestionEntreprise.refuser',  ['title' => 'Ajouter une une' , 'entreprises' => $entreprises,'regions' => $regions]);
    }
    public function validerEntreprise($id)
    {
        Entreprise::where('id', $id)->update(['statut' => 'valide']);
        return redirect()->route('entreprises.index')
        ->with('success','Entreprise validée avec succès.');
    }

    public function refuserEntreprise($id)
    {

        Entreprise::where('id', $id)->update(['statut' => 'refuse']);
        return redirect()->route('entreprises.index')
        ->with('success','Entreprise refusée avec succès.');
    }
}
