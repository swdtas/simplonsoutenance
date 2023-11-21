<?php

namespace App\Http\Controllers;
use App\Models\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Models\Domaine;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domaines=Domaine::all();
        $regions =Region::all();
        return view('backoffice.GestionPara.Domaine.index', ['regions' => $regions , 'domaines' =>$domaines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions =Region::all();
        return view('backoffice.GestionPara.Region.create',  ['title' => 'Ajouter une region' , 'regions' => $regions,]);
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(StoreRegionRequest $request)
{
    try {
        $inputs = $request->validated();
        Region::create($inputs);
        return redirect()->route('regions.index')->with('success', 'region créé avec succès !');

    } catch (\Exception $e) {

        return redirect()->route('regions.create')->withInput()->with('error', 'Échec de l\'enregistrement : ' . $e->getMessage());
    }
}



    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        try {
        $inputs = $request->validated();
        $region->update($inputs);
        return redirect()->route('regions.index')->with('success', 'region modifié avec succès !');
    } catch (\Exception $e) {

        return redirect()->route('regions.index')->withInput()->with('error', 'Échec de l\'enregistrement : ' . $e->getMessage());
    }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return  redirect()->route('regions.index')->with('success', 'region supprimé avec succès !');
    }

}
