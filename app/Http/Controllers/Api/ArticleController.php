<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends BaseController
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
                'code' => 'required|max:20',
                'designation' => 'required|max:20',
                'quantite' => 'required|max:20',
                'codeMonnaie' => 'required',
                'prixUnitaire' => 'required|max:4',
                'stockAlerte' => 'required|max:3',
                'codeCategorie' => 'required|max:20',
                'structure_id' => 'required'
            ]);
            if($validator->fails()){
                return $this->sendError("Erreur Synchronisation Error: ". $validator->errors());
            }

            $article = Article::create($input);
            return $this->sendResponse(new $article, 'Article Synchoniser Avec Success.');

        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: ". $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
