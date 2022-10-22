<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function structures()
    {
        return view('pages.structure');
    }
    public function banques()
    {
        return view('pages.data.banque');
    }
    public function operateurs()
    {
        return view('pages.data.operateur');
    }
    public function provinces()
    {
        return view('pages.localisation.province');
    }
    public function villes()
    {
        return view('pages.localisation.ville');
    }
    public function communes()
    {
        return view('pages.localisation.commune');
    }
    public function quartiers()
    {
        return view('pages.localisation.quartier');
    }

    public function addstructure()
    {
        return view('pages.ControleStructure.add-structure');
    }
    public function editstructure($ids)
    {
        return view('pages.ControleStructure.edit-structure', compact('ids'));
    }
    public function accountlevel()
    {
        return view('pages.comptabilite.account-level');
    }
    public function accounttype()
    {
        return view('pages.comptabilite.account-type');
    }
}