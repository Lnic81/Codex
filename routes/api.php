<?php

use App\Http\Controllers\api\v1\AccediController;
use App\Http\Controllers\api\v1\CategoriaController;
use App\Http\Controllers\api\v1\EpisodiController;
use App\Http\Controllers\api\v1\FilmController;
use App\Http\Controllers\api\v1\SerieTvController;
use App\Http\Controllers\Api\v1\UtentiController;
use App\Http\Middleware\ContattoRuolo;
use App\Models\SessioneUtente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */



//mettiamo un if per definire una costante
if (!defined('_VERS')){  //_VERS è la costante
    define('_VERS', 'v1');
}


//rotte aperte
Route::get(_VERS . '/categorie', [CategoriaController::class ,'index']);
Route::post(_VERS . '/registrazione', [UtentiController::class, 'creaUtente']);
Route::post(_VERS . '/registrazione/utenza', [UtentiController::class, 'creaUtenza']);
Route::get(_VERS . '/accedi/{utente}/{hash?}',[AccediController::class, 'show']);
Route::get(_VERS . '/testLogin',[AccediController::class, 'testLogin']);



//rotte con doppia autenticazione
Route::middleware(["autenticazione", 'ContattoRuolo:Amministratore,Utente'])->group(function(){

    //Rotta per le categorie Film
    Route::get(_VERS . '/categorie', [CategoriaController::class ,'index']);
    Route::get(_VERS . '/categorie/{categoria}', [CategoriaController::class ,'show']);


    //Rotta per i Film
    Route::get(_VERS . '/Film', [FilmController::class ,'index']);
    Route::get(_VERS . '/Film/{film}', [FilmController::class ,'show']);


    //Rotta per le SerieTv
    Route::get(_VERS . '/serieTv', [SerieTvController::class ,'index']);
    Route::get(_VERS . '/serieTv/{serieTv}', [SerieTvController::class ,'show']);
    //Rotta per gli Episodi delle SerieTv
    Route::get(_VERS . '/episodi', [EpisodiController::class ,'index']);
    Route::get(_VERS . '/episodi/{episodio}', [EpisodiController::class ,'show']);

    //Rotte Gestione profilo
    Route::post(_VERS . '/utenti/{utente}/aggiungiCredito/{importo}', [UtentiController::class ,'aggiungiCredito']);



});



//rotte con l'autenticazione da Admin
Route::middleware(["autenticazione", 'ContattoRuolo:Amministratore'])->group(function(){

    //rotte per categorie
    Route::post(_VERS . '/categorie', [CategoriaController::class ,'store']);
    Route::put(_VERS . '/categorie/{categoria}', [CategoriaController::class ,'update']);
    Route::delete(_VERS . '/categorie/{categoria}', [CategoriaController::class ,'destroy']);

    //rotte per i film
    Route::post(_VERS . '/Film', [FilmController::class ,'store']);
    Route::put(_VERS . '/Film/{film}', [FilmController::class ,'update']);
    Route::delete(_VERS . '/Film/{film}', [FilmController::class ,'destroy']);

    //rotte per serie tv
    Route::post(_VERS . '/serieTv', [SerieTvController::class ,'store']);
    Route::put(_VERS . '/serieTv/{serieTv}', [SerieTvController::class ,'update']);
    Route::delete(_VERS . '/serieTv/{serieTv}', [SerieTvController::class ,'destroy']);

    //rotte per gli ep. serie tv
    Route::post(_VERS . '/episodi', [EpisodiController::class ,'store']);
    Route::put(_VERS . '/episodi/{episodio}', [EpisodiController::class ,'update']);
    Route::delete(_VERS . '/episodi/{episodio}', [EpisodiController::class ,'destroy']);

    //rotte per verificare gli utenti 
    Route::get(_VERS . '/utenti', [UtentiController::class ,'index']);
    Route::get(_VERS . '/utenti/{utente}', [UtentiController::class ,'show']);
    Route::post(_VERS . '/utenti', [UtentiController::class ,'store']);
    Route::put(_VERS . '/utenti/{utenti}', [UtentiController::class ,'update']);
    Route::delete(_VERS . '/utenti/{utente}', [UtentiController::class ,'destroy']);


    // Route::put(_VERS . '/utenti/credito/{utente}', [UtentiController::class ,'update']);



});