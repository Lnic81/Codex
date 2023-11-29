<?php

namespace Database\Seeders;

use App\Models\ruoloUtente_potereUtente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ruoliUtente_poteriUtente extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ruoloUtente_potereUtente::create(["id"=>1, "idRuoloUtente"=> 1, "idPotereUtente"=>1]);
        ruoloUtente_potereUtente::create(["id"=>2, "idRuoloUtente"=> 1, "idPotereUtente"=>2]);
        ruoloUtente_potereUtente::create(["id"=>3, "idRuoloUtente"=> 1, "idPotereUtente"=>3]);
        ruoloUtente_potereUtente::create(["id"=>4, "idRuoloUtente"=> 1, "idPotereUtente"=>4]);
        ruoloUtente_potereUtente::create(["id"=>5, "idRuoloUtente"=> 2, "idPotereUtente"=>1]);
        ruoloUtente_potereUtente::create(["id"=>6, "idRuoloUtente"=> 2, "idPotereUtente"=>3]);
    }
}