<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\UtenzaRequest;
use App\Http\Requests\v1\modificaDatiRequest;
use App\Http\Requests\v1\UtentiStoreRequest;
use App\Http\Requests\v1\UtentiUpdateRequest;
use App\Http\Resources\v1\UtentiCollection;
use App\Http\Resources\v1\UtentiResource;
use App\Models\Utente;

use App\Models\ContattoAuth;
use App\Models\PasswordUtente;
use App\Models\utente_ruoloUtente;
use Database\Seeders\utenti_ruoliUtente;

class UtentiController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        $risorsa = Utente::all();
        $ritorno = new UtentiCollection($risorsa);
        return $ritorno;
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Illuminated\Http\Request $request
     * @return Illuminated\Http\Response
     */
    public function store(UtentiStoreRequest $request)
    {
        $dati = $request->validated(); //verificare i dati
        $utente = Utente::create($dati); // creo i dati (model = alla classe del model:metodo per creare i dati) e li metto dentro la variabile
        return new UtentiResource($utente); // ritorna una nuova istanza resource con la risorsa creata
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return Illuminated\Http\Response
     */
    public function show(Utente $utente)
    {

        $risorsa = new UtentiResource($utente);
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Illuminated\Http\Request $request
     * @param int $id
     * @return Illuminated\Http\Response
     */
    public function update(UtentiUpdateRequest $request, Utente $utente)
    {
        //prelevare i dati -> sono nella $request

        //verificare i dati
        $dati = $request->validated();
        //inserirli nell'oggetto al database preparare model
        $utente->fill($dati);
        //salvarlo
        $utente->save();
        //ritornare la risorsa modificata
        return new UtentiResource($utente);

      
    }


    public function destroy(Utente $utente)
    {
        $utente->deleteOrFail();
        return response()->noContent();
    }



    public function aggiungiCredito($idUtente, $importo)
    {
    $utente= Utente::findOrFail($idUtente);
    $nuovoCredito=$utente->credito + $importo;
    $utente->credito = $nuovoCredito;
    $utente->save();

    return response()->json(['message' => 'credito aggiunto']);
}

public function creaUtente(modificaDatiRequest $request){
    $utente = new Utente();

    $hashCdf=hash('sha512', 'codiceFiscale');

    $utente->nome =$request->input('nome');
    $utente->cognome =$request->input('cognome');
    $utente->sesso =$request->input('sesso');
    $utente->dataNascita =$request->input('dataNascita');
    $utente->cittadinanza =$request->input("cittadinanza");
    $utente->credito =$request->input('credito');
    $utente->idStato =$request->input('idStato');
    $utente->prova =$request->input('prova');
    $utente->codiceFiscale =$hashCdf;
//    $utente->email =$request->input(hash("sha512",trim('email')));
//    $utente->cellulare =$request->input(hash("sha512",trim('cellulare')));


    $utente->save();

    return response()->json(['message'=>'Utente creato!', $utente]);
    }

    public function creaUtenza(UtenzaRequest $request){
        $utenteAuth = new ContattoAuth();
        $password = new PasswordUtente();
        $utente_ruoloUtente = new utente_ruoloUtente();

        $hashUser=hash('sha512', 'user');
        $hashPsw=hash('sha512', 'password');
        $hashSale=hash('sha512', 'sale');


        $utenteAuth->idUtente = $request->input('idUtente');
        $utenteAuth->user = $hashUser;
        $utenteAuth->sfida = $request->input('sfida');
        $utenteAuth->secretJWT = $request->input('secretJWT');
        $utenteAuth->inizioSfida = $request->input('inizioSfida');


        $password->idUtente = $request->input('idUtente');
        $password->psw= $hashPsw;
        $password->sale= $hashSale;

        
        $utente_ruoloUtente->idUtente = $request->input('idUtente');
        $utente_ruoloUtente->idRuoloUtente = $request->input('idRuoloUtente');
        



        $utenteAuth->save();
        $password->save();
        $utente_ruoloUtente->save();

        return response()->json(['message'=>'Credenziali create!', $utenteAuth]);
    }
    
}