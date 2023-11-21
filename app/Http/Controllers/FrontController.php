<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showEspaceEntreprise()
    {
        return view('frontoffice.espace_entreprise');
    }


    public function showAccueil()
    {
        return view('frontoffice.accueil');
    }

    public function showOffre()
    {
        return view('frontoffice.offre');
    }

    public function showActualite()
    {
        return view('frontoffice.actualite');
    }

    public function showCandidat()
    {
        return view('frontoffice.candidat');
    }


}
