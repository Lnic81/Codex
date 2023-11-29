<?php

namespace Database\Seeders;

use App\Models\ruoloUtente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ruoliUtente extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ruoloUtente::create(["idRuoloUtente"=> 1, "ruolo"=>"Amministratore"]);
        ruoloUtente::create(["idRuoloUtente"=> 2, "ruolo"=>"Utente"]);
        ruoloUtente::create(["idRuoloUtente"=> 3, "ruolo"=>"Ospite"]);
    }
}