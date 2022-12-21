<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\PostBaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\GLAccount;
use App\Models\GLAccountClasse;
use App\Models\Structure;
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
        $articles = Article::all();
        return $articles->toJson();
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
            $this->add_gl_account($article->designation, $article->structure_id, $article->id);
            return $this->sendResponse($success, 'Article Synchoniser Avec Success.');
        } catch (\Throwable $th) {
            return $this->sendError("Erreur Synchronisation Error: " . $th);
        }
    }

    public function add_gl_account($description, $structure, $id_article)
    {
        $acounts_bilan = GLAccount::where('code', "31")->first();
        // dd($acounts_bilan);
        $vars = Article::where('structure_id', $structure)->count();
        // dd($vars);
        $newAccount = $vars;
        $codeAccount = "31" . "." . $newAccount;
        $gl_account = GLAccount::create(
            [
                'code' => $codeAccount,
                'description' => $description,
                'isAccount_system' => "0",
                'account_type_id' => $acounts_bilan->account_type_id,
                'account_level_id' => "1",
                'currency_id' => "$",
                'account_classe' => $acounts_bilan->account_classe,
                'account_id' => $acounts_bilan->id,
                'structure_id' => $structure,
            ]
        );

        $accounts_charges = GLAccount::where('code', "60")->first();
        $codeAccount = "60" . "." . $newAccount;
        $glAccount_charge = GLAccount::create(
            [
                'code' => $codeAccount,
                'description' => 'Achat et Variation Stock: ' . $description,
                'isAccount_system' => "0",
                'account_type_id' => $accounts_charges->account_type_id,
                'account_level_id' => "1",
                'currency_id' => "$",
                'account_classe' => $accounts_charges->account_classe,
                'account_id' => $accounts_charges->id,
                'structure_id' => $structure,
            ]
        );
        $accounts_produit = GLAccount::where('code', "70")->first();
        $codeAccount = "70" . "." . $newAccount;
        $glAccouns_produit = GLAccount::create(
            [
                'code' => $codeAccount,
                'description' => 'Vente : ' . $description,
                'isAccount_system' => "0",
                'account_type_id' => $accounts_produit->account_type_id,
                'account_level_id' => "1",
                'currency_id' => "$",
                'account_classe' => $accounts_produit->account_classe,
                'account_id' => $accounts_produit->id,
                'structure_id' => $structure,
            ]
        );
        Article::find($id_article)->fill(
            [
                'GLArticle' => $gl_account->code,
                'GLChargeArticle' => $glAccount_charge->code,
                'GLProduitArticle' => $glAccouns_produit->code,
            ]
        )->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($structure)
    {
        if ($structure) {
            $articles = Article::where('structure_id', $structure)->get();
            return $articles;
        }
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