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

Route::get('/', function () {
    return view('welcome');
});
//  Routes pour les administrateurs.
Route::resource('admins', \App\Http\Controllers\AdminController::class);
//  Routes pour les agriculteurs.
Route::resource('agriculteurs', \App\Http\Controllers\AgriculteurController::class);
//  Routes pour les agronommes.
Route::resource('agronommes', \App\Http\Controllers\AgronommeController::class);
//  Routes pour les cultures.
Route::resource('cultures', \App\Http\Controllers\CultureController::class);
//  Routes pour les parcelles.
Route::resource('parcelles', \App\Http\Controllers\ParcelleController::class);
//  Routes pour les personnes.
Route::resource('personnes', \App\Http\Controllers\PersonneController::class);


//      Routes pour les propositions :
//Route::resource('propositions', \App\Http\Controllers\PropositionController::class);

Route::get('propositions', [\App\Http\Controllers\PropositionController::class, 'index'])->name('listesPropositions');
Route::get('ajouterProposition', [\App\Http\Controllers\PropositionController::class, 'create'])->name('creerProposition');
Route::post('Sauvegarder', [\App\Http\Controllers\PropositionController::class, 'store'])->name('sauvgarderProposition');
Route::get('modifierProposition/{numProposition}', [\App\Http\Controllers\PropositionController::class, 'edit'])->name('modifierProposition');
Route::post('sauvegarderModification/{numProposition}', [\App\Http\Controllers\PropositionController::class, 'update'])->name('sauvegarderModification');
Route::post('supprimerProposition', [\App\Http\Controllers\PropositionController::class, 'destroy'])->name('suppression');
Route::get('afficherProposition', [\App\Http\Controllers\PropositionController::class, 'show'])->name('afficherProposition');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

