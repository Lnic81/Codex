<?php

namespace Database\Seeders;

use App\Models\ContattoAuth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class utenteAuth extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattoAuth::create([
            "idUtenteAuth"=>1,
            "idUtente"=>1,
            "user"=>hash("sha512" , trim("Luca")),
            "sfida"=>'',
            "secretJWT"=>'',
            "inizioSfida"=>'',
            "obbligoCambio"=>'',
        ]);
    }
}