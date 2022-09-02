<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\CategorieArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategorieArticleController extends  BaseController
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
                'designation' => 'required',
                'structure_id' => 'required'
            ]);

            if($validator->fails()){
                // return $this->sendError('Synchronisation Error.', $validator->errors());
                return $this->sendError("Erreur Synchronisation Error: ". $validator->errors());
            }

            $cat = CategorieArticle::create($input);
            return $this->sendResponse(new $cat, 'Categorie Article created successfully.');

        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: ". $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieArticle  $categorieArticle
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieArticle $categorieArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieArticle  $categorieArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorieArticle $categorieArticle)
    {
            if($categorieArticle->update($request->all())){
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
     * @param  \App\Models\CategorieArticle  $categorieArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieArticle $categorieArticle)
    {
        //
    }
}
