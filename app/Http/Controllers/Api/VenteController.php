<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
use App\Models\DetailVente;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

                // 'idVente' => 'required',
                'quantite' => 'required',
                'montant' => 'required',
                'idArticle' => 'required'
            ]);
            if($validator->fails()){
                return $this->sendError("Erreur Synchronisation Error: ". $validator->errors());
            }

            $article = Vente::create([
                'codeVente' => $request->codeVente,
                'dateVente' => $request->dateVente,
                'montantTotal' => $request->montantTotal,
                'codeClient' => $request->codeClient,
                'structure_id' => $request->id_structure,
            ]);
            $success['vente'] =  $article->id;
            $dvente = DetailVente::create([
                'idVente' => $article->id,
                'quantite' => $request->quantite,
                'montant' => $request->montant,
                'idArticle' => $request->idArticle,
            ]);
            $success['detail'] =  $dvente->id;
            return $this->sendResponse($success, 'Vente Synchoniser Avec Success.');

        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: ". $th);
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
