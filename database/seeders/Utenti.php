<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utente;

class Utenti extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Utente::create([
            "nome"=>"Luca",
            "cognome"=>"Niccolini",
            "sesso"=>1,
            "idStato"=>1,
            // "idRuoloUtente"=>1,
            "cittadinanza"=>"Ita",
            "dataNascita"=> "1996-11-15",
            "credito"=>0,
            "codiceFiscale"=>hash("sha512", trim("NCCLCU96S15LA117P")),
        ]);
    }
}