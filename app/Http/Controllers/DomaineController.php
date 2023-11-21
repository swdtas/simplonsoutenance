<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Http\Requests\StoreDomaineRequest;
use App\Http\Requests\UpdateDomaineRequest;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domaines =Domaine::all();
        return view('backoffice.GestionPara.Domaine.create',  ['title' => 'Ajouter un domaine' , 'domaines' => $domaines,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDomaineRequest $request)
    {

        try {
            $inputs = $request->validated();
            Domaine::create($inputs);
            return redirect()->route('regions.index')->with('success', 'Domaine ajouter avec succès !');
        } catch (\Exception $e) {

            return redirect()->route('regions.index')->withInput()->with('error', 'Échec de l\'enregistrement : ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Domaine $domaine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domaine $domaine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDomaineRequest $request, Domaine $domaine)
    {
        try {
        $inputs = $request->validated();
        $domaine->update($inputs);
        return redirect()->route('regions.index')->with('success', 'Domaine modifié avec succès !');
    } catch (\Exception $e) {

        return redirect()->route('regions.index')->withInput()->with('error', 'Échec de l\'enregistrement : ' . $e->getMessage());
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domaine $domaine)
    {
        $domaine->delete();
        return  redirect()->route('regions.index')->with('success', 'domaine supprimé avec succès !');
    }
}
