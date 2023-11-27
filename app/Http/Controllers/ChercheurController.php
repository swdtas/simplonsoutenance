<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use App\Http\Requests\StoreChercheurRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateChercheurRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChercheurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chercheurs = Chercheur::all();
        return view('backoffice.GestionChercheur.index',  ['title' => 'Ajouter un chercheur emploi', 'chercheurs' => $chercheurs,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chercheurs = Chercheur::all();

        if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'user')) {
            return view('backoffice.GestionChercheur.create', ['title' => 'Ajouter un chercheur emploi', 'chercheurs' => $chercheurs]);
        } else {
            return view('frontoffice.enregistrement-chercheur');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */

    public function store(StoreChercheurRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => 'chercheur',
            ]);

            $photo = $request->file('photo');
            $photoName = null;

            if ($photo) {
                $photoName = time() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/photos', $photoName);
            }

            Chercheur::create([
                'adresse' => $request->input('adresse'),
                'date_naissance' => $request->input('date_naissance'),
                'genre' => $request->input('genre'),
                'telephone' => $request->input('telephone'),
                'statut_matrimonial' => $request->input('statut_matrimonial'),
                'user_id' => $user->id,
                'photo' => $photoName,
                'statut' => 'en attente',
            ]);

            // Redirection vers une page spécifique après la création
            return redirect()->route('chercheurs.index')->with('success', 'Compte créé avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('chercheurs.index')->with('error', 'Échec de l\'enregistrement : ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Chercheur $chercheur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chercheur $chercheur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChercheurRequest $request, Chercheur $chercheur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chercheur $chercheur)
    {
        $chercheur->delete();
        return back()->with('success', 'Chercheurs supprimée avec succès.');
    }

    public function attente()
    {
        // Mettez à jour le statut de l'entreprise à 'valide' par exemple

        $chercheurs = Chercheur::all();
        return view('backoffice.GestionChercheur.attente',  ['title' => 'Validation Chercheur', 'chercheurs' => $chercheurs]);
    }
    public function refuser()
    {

        $chercheurs = Chercheur::all();
        return view('backoffice.GestionChercheur.refuser',  ['title' => 'Chercheurs Refuser', 'chercheurs' => $chercheurs]);
    }
    public function validerChercheur($id)
    {
        Chercheur::all();
        Chercheur::where('id', $id)->update(['statut' => 'valide']);
        return redirect()->route('chercheurs.index')
            ->with('success', 'Chercheurs validée avec succès.');
    }

    public function refuserChercheur($id)
    {

        Chercheur::where('id', $id)->update(['statut' => 'refuse']);
        return redirect()->route('chercheurs.index')
            ->with('success', 'chercheur refusée avec succès.');
    }
}
