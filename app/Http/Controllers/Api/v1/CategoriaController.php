<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CategoriaStoreRequest;
use App\Http\Requests\v1\CategoriaUpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Resources\v1\CategoriaCollection;
use App\Http\Resources\v1\CategoriaResource;
use Database\Seeders\categorie;
use Illuminate\Support\Facades\Gate;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        
        if (Gate::allows('vedere')) { 
            echo 'vedere';
            if (Gate::allows('Amministratore')) {
                $risorsa = Categoria::all();
            } else {
                $risorsa = Categoria::all();
            }
            return new CategoriaCollection($risorsa);
        } else {
            abort(403, 'errore gate');
        }
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Illuminated\Http\Request $request
     * @return Illuminated\Http\Response
     */
    public function store(CategoriaStoreRequest $request)  //prendo i dati dalla Request
    {
        if (Gate::allows("creare")) {
            $dati = $request->validated();   //verificare i dati
            $categoria = Categoria::create($dati);   // creo i dati (model = alla classe del model:metodo per crare i dati) e li metto dentro la variabile
            return new CategoriaResource($categoria); // ritorna la risorsa creata
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
    public function show(Categoria $categoria)
    {
        if (Gate::allows("vedere")) {
            if (Gate::allows('Amministratore')) {
                $risorsa = new CategoriaResource($categoria);
            } else {
                $risorsa = new CategoriaResource($categoria); 
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
    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        if (Gate::allows("modificare")) {
            //prelevare i dati -> sono nella $request

            //verificare i dati
            $dati = $request->validated();  //variabile = la request+funzione
            //inserirli nell'oggetto al database preparare model
            $categoria->fill($dati); //prendo il model -> inserisco i dati nella variabile
            //salvarlo
            $categoria->save(); //prendo il model e lo salvo
            //ritornare la risorsa modificata
            return new CategoriaResource($categoria); //ritorna la risorsa modificata
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        if (Gate::allows("eliminare")) {
            $categoria->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403);
        }
    }
}