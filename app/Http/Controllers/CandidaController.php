<?php

namespace App\Http\Controllers;
use App\Models\Candida;
use App\Http\Requests\StoreCandidaRequest;
use App\Http\Requests\UpdateCandidaRequest;
use App\Models\Chercheur;
use App\Models\Domaine;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class CandidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        $domaines=Domaine::all();
        $regions=Region::all();
        $chercheurs=Chercheur::all();
        $candidats = Candida::all();
        return view('backoffice.GestionCandidature.index',  ['title' => 'Poster une Candidature' , 'candidats' => $candidats, 'regions' => $regions, 'domaines' => $domaines,'chercheurs' => $chercheurs,'user' => $user]);

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
    public function store(StoreCandidaRequest $request)
    {
        try {
        $validatedData = $request->validated();
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv');
            $validatedData['cv'] = $cvPath;
        }
        Candida::create($validatedData);
        return redirect()->route('candidas.index')->with('success', 'Candidature ajoutée avec succès');
    } catch (\Exception $e) {
        return redirect()->route('candidas.index')->with('error', 'Échec de l\'enregistrement : ' . $e->getMessage());
    }
    }



    /**
     * Display the specified resource.
     */
    public function show(Candida $candida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candida $candida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidaRequest $request, Candida $candida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candida $candida)
    {
        try {

            $candida->delete();

            return redirect()->route('candidas.index')->with('success', 'Candidature supprimée avec succès');
        } catch (\Exception $e) {

            return redirect()->route('candidas.index')->with('error', 'Échec de la suppression : ' . $e->getMessage());
        }
    }



    public function showCv(Candida $candida)
    {
        $filePath = storage_path("app/cv/{$candida->cv}");

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            return redirect()->route('candidas.index')->with('error', 'Le CV n\'existe pas.');
        }
    }




}
