<?php

namespace Database\Seeders;

use App\Models\potereUtente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class poteriUtente extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        potereUtente::create(["idPotereUtente"=> 1, "nomePotere"=>"Vedere", "potere"=>"vedere"]);
        potereUtente::create(["idPotereUtente"=> 2, "nomePotere"=>"Creare", "potere"=>"creare"]);
        potereUtente::create(["idPotereUtente"=> 3, "nomePotere"=>"Modificare", "potere"=>"modificare"]);
        potereUtente::create(["idPotereUtente"=> 4, "nomePotere"=>"Eliminare", "potere"=>"eliminare"]);
    }
}