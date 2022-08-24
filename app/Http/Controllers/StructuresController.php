<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StructuresController extends Controller
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

    public function index($structure)
    {
        return view('pages.structure.home', compact('structure'));
    }
    public function comptebancaire($structure)
    {
        return view('pages.structure.compte-bancaire', compact('structure'));
    }
    public function monnaielectronique($structure)
    {
        return view('pages.structure.monnai-electro', compact('structure'));
    }
    public function agents($structure)
    {
        return view('pages.structure.agent', compact('structure'));
    }
    public function ventes($structure)
    {
        return view('pages.structure.vente', compact('structure'));
    }
    public function utilisateurs($structure)
    {
        return view('pages.structure.utilisateur', compact('structure'));
    }



}
