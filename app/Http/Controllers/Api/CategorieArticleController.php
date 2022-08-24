<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategorieArticle;
use Illuminate\Http\Request;

class CategorieArticleController extends Controller
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
        if(CategorieArticle::create($request->all()))
        {
            return response()->json(
                [
                    'success' => 'Enregistrer avec Success'
                ]
            );
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
