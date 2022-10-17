<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $agents = Agent::all();
        // return $agents->toJson();
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
                'noms' => 'required|max:20',
                'sexe' => 'required',
                'etatcivil' => 'required',
                'adresse' => 'required',
                'structure_id' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->sendError("Erreur Synchronisation: " . $validator->errors());
            }
            $agent = Agent::create([
                'matricule' => $request->matricule,
                'noms' => $request->noms,
                'sexe' => $request->sexe,
                'etatcivil' => $request->etatcivil,
                'adresse' => $request->adresse,
                'structure_id' => $request->structure_id,
            ]);
            $success['id'] =  $agent->id;
            return $this->sendResponse($success, 'agent Synchoniser Avec Success.');
        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: " . $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}