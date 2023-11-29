<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieTvResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->getCampi();
    }






    //------------- PROTECTED ------------------------------------------------
    

    protected function getCampi(){
        // QUESTA FUNZIONE è PER LA FUNZIONE INDEX DOVE VISUALIZZO TUTTI I CAMPI
        return [
        "idSerieTv" => $this->idSerieTv,
        "titolo" => $this->titolo,
        "durata" => $this->durata,
        "episodi" => $this->episodi,
        "stagioni" => $this->stagioni,
        "regista" => $this->regista,
        "categoria" => $this->categoria,
        "anno" => $this->anno,
        "trama" => $this->trama,
        ];


        // QUESTA FUNZIONE è PER LA FUNZIONE SHOW DOVE VISUALIZZO SOLO UN  CAMPO
        //return [
        // "idSerieTv"=> 2,
        // "titolo"=> "Chuck",
        // "durata"=> 42 ,
        // "stagioni"=> 5,
        // "episodi"=> 91, 
        // "regista"=> "Josh Schwartz",
        // "categoria"=> "Azione",
        // "anno"=> 2007 ,
        // "trama"=> "Chuck Bartowski è un ragazzo di Burbank, in California, dove lavora come esperto di computer nel negozio di elettronica Buy More al NerdHerd, insieme al suo migliore amico Morgan Grimes. La serie racconta le vicende di Chuck, che riceve da un vecchio amico, un agente della CIA, una e-mail criptata che scarica inconsciamente nel suo cervello tutti i segreti del supercomputer neurale Intersect, costruito da CIA e NSA come database centralizzato",
        //];
    }
}