<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends BaseController
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
                'codeClient' => 'required|max:20',
                'noms' => 'required|max:20',
                'telephone' => 'required',
                'email' => 'required',
                'adresse' => 'required',
                'structure_id' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->sendError("Erreur Synchronisation: " . $validator->errors());
            }
            $client = Client::create([
                'codeClient' => $request->codeClient,
                'noms' => $request->noms,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'adresse' => $request->adresse,
                'structure_id' => $request->structure_id,
            ]);
            $success['id'] =  $client->id;
            return $this->sendResponse($success, 'client Synchoniser Avec Success.');
        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: " . $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($structure)
    {
        if ($structure) {
            $client = Client::where('structure_id', $structure)->get();
            return $client;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        if ($client->update($request->all())) {
            return response()->json(
                [
                    'success' => 'Update avec Success'
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}