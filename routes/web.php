<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/structures', [App\Http\Controllers\HomeController::class, 'structures'])->name('structures');
    Route::get('/add-structure', [App\Http\Controllers\HomeController::class, 'addstructure'])->name('add-structure');
    Route::get('/edit-structure/{ids}', [App\Http\Controllers\HomeController::class, 'editstructure'])->name('edit-structure');
    Route::get('/banques', [App\Http\Controllers\HomeController::class, 'banques'])->name('banques');
    Route::get('/operateurs', [App\Http\Controllers\HomeController::class, 'operateurs'])->name('operateurs');
    Route::get('/provinces', [App\Http\Controllers\HomeController::class, 'provinces'])->name('provinces');
    Route::get('/villes', [App\Http\Controllers\HomeController::class, 'villes'])->name('villes');
    Route::get('/communes', [App\Http\Controllers\HomeController::class, 'communes'])->name('communes');
    Route::get('/quartiers', [App\Http\Controllers\HomeController::class, 'quartiers'])->name('quartiers');
});


// Route vers les pages de la structure
Route::prefix('{structure}')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('/home', [App\Http\Controllers\StructuresController::class, 'index'])->name('home');
    Route::get('/comptes', [App\Http\Controllers\StructuresController::class, 'comptebancaire'])->name('comptebancaire');
    Route::get('/monnais', [App\Http\Controllers\StructuresController::class, 'monnaielectronique'])->name('monnaielectronique');
    Route::get('/agents', [App\Http\Controllers\StructuresController::class, 'agents'])->name('agents');
    Route::get('/utilisateurs', [App\Http\Controllers\StructuresController::class, 'utilisateurs'])->name('utilisateurs');
    Route::get('/ventes', [App\Http\Controllers\StructuresController::class, 'ventes'])->name('ventes');

    Route::get('/add-monnaies', [App\Http\Controllers\StructuresController::class, 'addmonnais'])->name('addmonnais');
    Route::get('/edit-monnaies/{ids}', [App\Http\Controllers\StructuresController::class, 'editmonnais'])->name('editmonnais');
});