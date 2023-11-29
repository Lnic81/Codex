<?php

namespace Database\Seeders;

use App\Models\utente_ruoloUtente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class utenti_ruoliUtente extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        utente_ruoloUtente::create(["idUtente"=> 1, "idRuoloUtente"=>1]);
        // utente_ruoloUtente::create(["idUtente"=> 2, "idRuoloUtente"=>2]);
        // utente_ruoloUtente::create(["idUtente"=> 3, "idRuoloUtente"=>2]);
    }
}