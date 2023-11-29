<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\EpisodiCollection;
use App\Http\Requests\v1\EpisodiStoreRequest;
use App\Http\Requests\v1\EpisodiUpdateRequest;
use App\Http\Resources\v1\EpisodiResource;
use Illuminate\Http\Request;
use App\Models\Episodio;
use Illuminate\Support\Facades\Gate;

class EpisodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows("vedere")) {
            if (Gate::allows('Amministratore')) {
                $risorsa = Episodio::all();
            } else {
                $risorsa = Episodio::all();
            }
            return new EpisodiCollection($risorsa);
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
    public function store(EpisodiStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $dati = $request->validated();                   //verificare i dati (creo una variabile dati = variabile request -> validated())
            $episodio = Episodio::create($dati);            // creo i dati ( variabile = model::metodo per crare i dati) e li metto dentro la variabile
            return new EpisodiResource($episodio);          // ritorna una nuova istanza resource con la risorsa creata
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
    public function show(Episodio $episodio)
    {
        if (Gate::allows("vedere")) {
            if (Gate::allows('Amministratore')) {
                $risorsa = new EpisodiResource($episodio);
            } else {
                $risorsa = new EpisodiResource($episodio);
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
    public function update(EpisodiUpdateRequest $request, Episodio $episodio)
    {
        if (Gate::allows("modificare")) {
            //prelevare i dati -> sono nella $request


            $dati = $request->validated(); //verificare i dati
            //inserisco i dati nell'oggetto al database,  preparazione del model
            $episodio->fill($dati);        //creo una variabile usa la funzione per inserire i dati questa variabile si chiama model
            //salvarlo
            $episodio->save(); //prendo il model e lo salvo
            //ritornare la risorsa modificata
            return new EpisodiResource($episodio); //ritorna una nuova istanza resource con la risorsa modificata
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episodio $episodio)
    {
        if (Gate::allows("eliminare")) {
            $episodio->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403);
        }
    }
}