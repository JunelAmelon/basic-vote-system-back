<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ElecteurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/acceuil', [ElecteurController::class, 'nombreElecteur']);
Route::get('/liste-candidat', [CandidatController::class, 'listeCandidat']);
Route::get('/nombre-vote', [CandidatController::class, 'nombreVote']);
Route::get('/voter', [ElecteurController::class, 'voterview']);
Route::get('/voter/traitement/{id_candidat}/{id_utilisateur}', [ElecteurController::class, 'votertraitement'])->name('voterTraitement');
Route::get('/identification', [ElecteurController::class, 'identifier_page']);
Route::post('/identification/traitement/', [ElecteurController::class, 'identifier']);