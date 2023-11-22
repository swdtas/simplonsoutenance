<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Http\Requests\StoreEntrepriseRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Models\Region;
use App\Models\User;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions=Region::all();
        $entreprises =Entreprise::all();
        return view('backoffice.GestionEntreprise.index',  ['title' => 'Ajouter une une' , 'entreprises' => $entreprises,'regions' => $regions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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

           return redirect()->route('entreprises.index')
                      ->with('success','Entreprise créée avec succès.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntrepriseRequest $request, Entreprise $entreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
        //
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
