<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodiResource extends JsonResource
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
        'idEpisodio' => $this->idEpisodio,
        'titolo' => $this->titolo,
        'serieTv'=> $this->serieTv,
        'episodio'=> $this->episodio,
        'stagione'=>$this->stagione,
        "durata" => $this->durata,
        "anno" => $this->anno,
        "trama" => $this->trama,
        ];

    }
}