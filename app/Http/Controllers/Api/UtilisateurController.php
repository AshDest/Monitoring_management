<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Structure;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends  BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return $utilisateurs->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Structure $structure)
    {
        // if($structure)
        // {
        //     return $structure;
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        //
    }

        /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['numTelephone'] = $user->numTelephone;
            $success['email'] = $user->email;
            $success['structure_id'] = $user->structure_id;

            return $this->sendResponse($success, 'User login successfully.');
            $this->structures($user->structure_id);


        }
        else{
            return $this->sendError('Erreur.', ['error'=>"L'utilisateur n'existe pas."]);
        }
    }

    public function structures($id)
    {
        $structure = Structure::find($id);
        if (is_null($structure)) {
            return $this->sendError('Pas de structure Pour ce user.');
            // dd('Product not found.');
        }
            return $this->sendResponse($structure, 'Structure retrieved successfully.');
    }
}
