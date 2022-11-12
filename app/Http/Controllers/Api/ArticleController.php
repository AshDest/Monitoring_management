<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\GLAccountClasse;
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
                'quantite' => 'nullable',
                'codeMonnaie' => 'nullable',
                'prixUnitaire' => 'required|max:8',
                'stockAlerte' => 'required|max:3',
                'codeCategorie' => 'required|max:20',
                'structure_id' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->sendError("Erreur Synchronisation: " . $validator->errors());
            }
            $article = Article::create($input);
            $success['id'] =  $article->id;
            $this->add_gl_account($article->designation, $article->structure_id);
            return $this->sendResponse($success, 'Article Synchoniser Avec Success.');
        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: " . $th);
        }
    }

    public function add_gl_account($description, $structure)
    {
        $accounts = GLAccountClasse::where('code', "31")->first();
        $vars = GLAccountClasse::where('code', "31")->where('structure_id', $structure)->count()->get();
        $newAccount = $vars + 1;
        GLAccountClasse::create(
            [
                'code' => $newAccount,
                'description' => $description,
                'isAccount_system' => "0",
                'account_type_id' => $accounts->account_type_id,
                'account_level_id' => "2",
                'currency_id' => "$",
                'account_classe' => $accounts->account_classe,
                'account_id' => $accounts->id,
                'structure_id' => $structure,
            ]
        )->save();;
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