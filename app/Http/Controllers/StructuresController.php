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


}
