<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\ApprovisionnementController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategorieArticleController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\DetailApprovisionnementController;
use App\Http\Controllers\Api\DetailVenteController;
use App\Http\Controllers\Api\FournisseurController;
use App\Http\Controllers\Api\PaiementController;
use App\Http\Controllers\Api\StructureController;
use App\Http\Controllers\Api\UtilisateurController;
use App\Http\Controllers\Api\VenteController;
use App\Models\DetailApprovisionnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('agent', AgentController::class);
Route::apiResource('approvisionnement', ApprovisionnementController::class);
Route::apiResource('detailapprovisionnement', DetailApprovisionnementController::class);
Route::apiResource('article', ArticleController::class);
Route::apiResource('categoriearticle', CategorieArticleController::class);
Route::apiResource('client', ClientController::class);
Route::apiResource('fournisseur', FournisseurController::class);
Route::apiResource('paiement', PaiementController::class);
Route::apiResource('structure', StructureController::class);
Route::apiResource('vente', VenteController::class);
Route::apiResource('detailvente', DetailVenteController::class);
Route::apiResource('utilisateurs', UtilisateurController::class);

Route::controller(UtilisateurController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});