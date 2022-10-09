<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
use App\Models\Approvisionnement;
use App\Models\DetailApprovisionnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApprovisionnementController extends BaseController
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
                'codeAprro' => 'nullable|max:20',
                'dateAppro' => 'required',
                'codeFournisseur' => 'required',
                'id_structure' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Erreur Synchronisation Error: " . $validator->errors());
            }
            $approvisionnement = Approvisionnement::create([
                'codeAprro' => $request->codeAprro,
                'dateAppro' => $request->dateAppro,
                'codeFournisseur' => $request->codeFournisseur,
                'structure_id' => $request->id_structure,
            ]);
            $success['approvisionnement'] =  $approvisionnement->id;
            $detapprovisionnement = [];
            $detapprovisionnement[] = $request->details;
            $count = count($detapprovisionnement);
            for ($i = 0; $i < $count; $i++) {
                foreach ($detapprovisionnement[$i]  as $key => $dv) {
                    $dapprovisionnement = DetailApprovisionnement::create([
                        'idAppro' => $approvisionnement->id,
                        'idArticle' => $dv['idArticle'],
                        'quantite' => $dv['quantite'],
                        'prix_achat' => $dv['prix_achat'],
                    ]);
                }
            }
            return $this->sendResponse($success, 'approvisionnement Synchoniser Avec Success.');
        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: " . $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function show(Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approvisionnement $approvisionnement)
    {
        //
    }
}