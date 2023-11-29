<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class categorie extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(["idCategoria"=> 1, "nome"=>"Azione"]);
        Categoria::create(["idCategoria"=> 2, "nome"=>"Fantasy"]);
        Categoria::create(["idCategoria"=> 3, "nome"=>"Commedia"]);
        
    }
}