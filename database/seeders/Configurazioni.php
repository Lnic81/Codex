<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Configurazione;

class Configurazioni extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configurazione::create(["idConfigurazione"=>1 , "chiave"=>"durataSessione", "valore"=>50000000000]);
        Configurazione::create(["idConfigurazione"=>2 , "chiave"=>"durataSfida", "valore"=>500000000000]);
        Configurazione::create(["idConfigurazione"=>3, "chiave"=>"maxLoginErrati", "valore"=>50000000000]);
        Configurazione::create(["idConfigurazione"=>4 , "chiave"=>"vecchiePsw", "valore"=>5000000000000]);
    }
}