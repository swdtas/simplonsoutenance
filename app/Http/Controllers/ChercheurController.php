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
        $user = Auth::user();

        // Si l'utilisateur est un chercheur, afficher seulement ses données
        if ($user->role === 'chercheur') {
            $chercheurs = Chercheur::where('user_id', $user->id)->get();

            return view('backoffice.GestionChercheur.index', [
                'title' => 'Vos données de chercheur',
                'chercheurs' => $chercheurs,
            ]);
        }

        // Si l'utilisateur est un admin, afficher toutes les données
        elseif ($user->role === 'admin') {
            $chercheurs = Chercheur::all();

            return view('backoffice.GestionChercheur.index', [
                'title' => 'Gestion des chercheurs',
                'chercheurs' => $chercheurs,
            ]);
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
        $chercheurs = Chercheur::all();
            return view('backoffice.GestionChercheur.create', ['title' => 'Ajouter un chercheur emploi', 'chercheurs' => $chercheurs]);


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
            if (Auth::check()) {
                return redirect()->route('chercheurs.index')->with('success', 'Compte créé avec succès.');
            } else {
                return redirect()->route('confirmation')->with('success', 'Compte créé avec succès.');
            }
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
