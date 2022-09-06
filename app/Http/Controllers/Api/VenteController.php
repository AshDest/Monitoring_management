<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
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
                'codeVente' => 'required|max:20',
                'dateVente' => 'required',
                'montantTotal' => 'required',
                'codeClient' => 'nullable',
                'id_structure' => 'required'
            ]);
            if($validator->fails()){
                return $this->sendError("Erreur Synchronisation Error: ". $validator->errors());
            }

            $article = Vente::create($input);
            $success['id'] =  $article->id;
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
