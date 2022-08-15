<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailApprovisionnement;
use Illuminate\Http\Request;

class DetailApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (DetailApprovisionnement::create($request->all())) {
            return response()->json(
                [
                    'success' => 'Enregistrer avec Success'
                ]
                );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailApprovisionnement  $detailApprovisionnement
     * @return \Illuminate\Http\Response
     */
    public function show(DetailApprovisionnement $detailApprovisionnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailApprovisionnement  $detailApprovisionnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailApprovisionnement $detailApprovisionnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailApprovisionnement  $detailApprovisionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailApprovisionnement $detailApprovisionnement)
    {
        //
    }
}