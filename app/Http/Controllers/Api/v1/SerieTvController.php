<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SerieTvStoreRequest;
use App\Http\Requests\v1\SerieTvUpdateRequest;
use App\Http\Resources\v1\SerieTvCollection;
use App\Http\Resources\v1\SerieTvResource;
use App\Models\SeriesTv;
use Database\Seeders\SerieTv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SerieTvController extends Controller
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
                $risorsa = SeriesTv::all();
            } else {
                $risorsa =  SeriesTv::all();
            }
            return new SerieTvCollection($risorsa);
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
    public function store(SerieTvStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $dati = $request->validated(); //verificare i dati
            $serieTv = SeriesTv::create($dati); // creo i dati (model = alla classe del model:metodo per crare i dati) e li metto dentro la variabile
            return new SerieTvResource($serieTv); // ritorna una nuova istanza resource con la risorsa creata
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
    public function show(SeriesTv $serieTv)
    {
        if (Gate::allows("vedere")) {
            if (Gate::allows('Amministratore')) {
                $risorsa = new SerieTvResource($serieTv);
            } else {
                $risorsa =  new SerieTvResource($serieTv);
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
    public function update(SerieTvUpdateRequest $request, Seriestv $serieTv)
    {
        if (Gate::allows("modificare")) {
            //prelevare i dati -> sono nella $request

            //verificare i dati
            $dati = $request->validated();
            //inserirli nell'oggetto al database preparare model
            $serieTv->fill($dati);
            //salvarlo
            $serieTv->save();
            //ritornare la risorsa modificata
            return new SerieTvResource($serieTv);
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeriesTv $serieTv)
    {
        if (Gate::allows("eliminare")) {
            $serieTv->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403);
        }
    }
}