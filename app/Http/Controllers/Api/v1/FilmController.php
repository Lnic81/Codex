<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Films;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FilmStoreRequest;
use App\Http\Requests\v1\FilmUpdateRequest;
use App\Http\Resources\v1\FilmCollection;
use App\Http\Resources\v1\FilmResource;
use Database\Seeders\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        if (Gate::allows("vedere")) {
            if (Gate::allows('Amministratore')) {
                $risorsa = Films::all();
            } else {
                $risorsa = Films::all();
            }
            return new FilmCollection($risorsa);
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Illuminated\Http\Request $request
     * @return Illuminated\Http\Response
     */
    public function store(FilmStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $dati = $request->validated();     //verificare i dati
            $film = Films::create($dati);     // creo i dati (model = alla classe del model:metodo per crare i dati) e li metto dentro la variabile
            return new FilmResource($film);    // ritorna una nuova istanza resource con la risorsa creata
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return Illuminated\Http\Response
     */
    public function show(Films $film)
    {
        if (Gate::allows("vedere")) {
            if (Gate::allows('Amministratore')) {
                $risorsa = new FilmResource($film);
            } else {
                $risorsa = new FilmResource($film);
            }
        } else {
            abort(403);
        }
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Illuminated\Http\Request $request
     * @param int $id
     * @return Illuminated\Http\Response
     */
    public function update(FilmUpdateRequest $request, Films $film)
    {
        if (Gate::allows("modificare")) {
            //prelevare i dati -> sono nella $request

            //verificare i dati
            $dati = $request->validated();  //variabile = la request+funzione
            //inserirli nell'oggetto al database preparare model
            $film->fill($dati); //prendo il model -> inserisco i dati nella variabile
            //salvarlo
            $film->save(); //prendo il model e lo salvo
            //ritornare la risorsa modificata
            return new FilmResource($film); //ritorna la risorsa modificata
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Films $film)
    {
        if (Gate::allows("eliminare")) {
            $film->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403);
        }
    }
}