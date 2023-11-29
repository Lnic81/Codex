<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
        'idFilm' => $this->idFilm,
        'titolo' => $this->titolo,
        "durata" => $this->durata,
        "regista" => $this->regista,
        "categoria" => $this->categoria,
        "anno" => $this->anno,
        "trama" => $this->trama,
        ];


        // QUESTA FUNZIONE è PER LA FUNZIONE SHOW DOVE VISUALIZZO SOLO UN  CAMPO
        //return [
        // "idFilm"=> 1,
        // "titolo"=> "The Fast and the Furious: Tokyo Drift",
        // "durata"=> 1.44 ,
        // "regista"=> "Justin Lin" ,
        // "categoria" => "azione",
        // "anno"=> 2006 ,
        // "trama"=> "Shaun Boswell è un ragazzo irrequieto al quale piace partecipare alle corse di auto clandestine. Finito nei guai con la giustizia, è costretto, per evitare la prigione, a raggiungere suo padre che è militare in servizio a Tokyo.",
        //];
    }
}