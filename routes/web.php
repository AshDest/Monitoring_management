<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/structures', [App\Http\Controllers\HomeController::class, 'structures'])->name('structures');
Route::get('/banques', [App\Http\Controllers\HomeController::class, 'banques'])->name('banques');
Route::get('/operateurs', [App\Http\Controllers\HomeController::class, 'operateurs'])->name('operateurs');
Route::get('/provinces', [App\Http\Controllers\HomeController::class, 'provinces'])->name('provinces');
Route::get('/villes', [App\Http\Controllers\HomeController::class, 'villes'])->name('villes');
Route::get('/communes', [App\Http\Controllers\HomeController::class, 'communes'])->name('communes');
Route::get('/quartiers', [App\Http\Controllers\HomeController::class, 'quartiers'])->name('quartiers');

// Route vers les pages de la structure

Route::get('{structure}/home', [App\Http\Controllers\StructuresController::class, 'index'])->name('home');
Route::get('{structure}/comptes', [App\Http\Controllers\StructuresController::class, 'comptebancaire'])->name('comptebancaire');
Route::get('{structure}/monnais', [App\Http\Controllers\StructuresController::class, 'monnaielectronique'])->name('monnaielectronique');
Route::get('{structure}/agents', [App\Http\Controllers\StructuresController::class, 'agents'])->name('agents');
Route::get('{structure}/ventes', [App\Http\Controllers\StructuresController::class, 'ventes'])->name('ventes');
