<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function default()
    {
        return view('backoffice.dashboard',);

    }
    public function chercheur()
    {
        return view('backoffice.GestionChercheur.dashboard',);

    }
    public function entriprise()
    {
        return view('backoffice.GestionEntreprise.dashboard',);

    }


}
