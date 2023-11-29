<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrazioneResource extends JsonResource
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
        'idUtente' => $this->idUtente,
        'nome' => $this->nome,
        "cognome" => $this->cognome,
        "sesso" => $this->sesso,
        "cittadinanza" => $this->cittadinanza,
        "dataNascita" => $this->dataNascita,
        ];
    }
}