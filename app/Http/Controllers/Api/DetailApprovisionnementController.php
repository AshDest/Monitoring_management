<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
use App\Models\DetailApprovisionnement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DetailApprovisionnementController extends BaseController
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
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'trans_id' => 'required',
                'idArticle' => 'required',
                'quantite' => 'required',
                'prix_achat' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->sendError("Erreur Synchronisation Error: " . $validator->errors());
            }
            $dapprov = DetailApprovisionnement::create(
                [
                    'trans_id' => $request->trans_id,
                    'idArticle' => $request->idArticle,
                    'quantite' => $request->quantite,
                    'prix_achat' => $request->prix_achat,
                ]
            );
            $success['id'] =  $dapprov->id;
            return $this->sendResponse($success, 'Detail Approvisionnement Synchoniser Avec Success.');
        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: " . $th);
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