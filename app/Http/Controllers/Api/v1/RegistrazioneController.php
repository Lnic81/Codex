<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\RegistrazioneStoreRequest;
use App\Http\Resources\v1\RegistrazioneResource;
use App\Http\Resources\v1\UtentiResource;
use App\Models\Utente;
use Illuminate\Http\Request;

class RegistrazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrazioneStoreRequest $request)
    {
       /* POSSO FARLO?
        $dati = $request->validated();
        $utente = Utente::create($dati);    
        return new UtentiResource($utente); */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}