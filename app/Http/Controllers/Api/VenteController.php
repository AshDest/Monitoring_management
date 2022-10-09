<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
use App\Models\DetailVente;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;

class VenteController extends BaseController
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
                'codeVente' => 'nullable|max:20',
                'dateVente' => 'required',
                'montantTotal' => 'required',
                'codeClient' => 'nullable',
                'id_structure' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError("Erreur Synchronisation Error: " . $validator->errors());
            }
            $vente = Vente::create([
                'codeVente' => $request->codeVente,
                'dateVente' => $request->dateVente,
                'montantTotal' => $request->montantTotal,
                'codeClient' => $request->codeClient,
                'structure_id' => $request->id_structure,
            ]);
            $success['vente'] =  $vente->id;
            $detVente = [];
            $detVente[] = $request->details;
            $count = count($detVente);
            for ($i = 0; $i < $count; $i++) {
                foreach ($detVente[$i]  as $key => $dv) {
                    $dvente = DetailVente::create([
                        'idVente' => $vente->id,
                        'quantite' => $dv['quantite'],
                        'montant' => $dv['montant'],
                        'idArticle' => $dv['idArticle'],
                    ]);
                }
            }
            return $this->sendResponse($detVente, 'Vente Synchoniser Avec Success.');
        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: " . $th);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vente $vente)
    {
        //
    }
}