<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            categorie::class,
            Film::class,
            SerieTv::class,
            Episodi::class,
            Utenti::class,
            ruoliUtente::class,
            poteriUtente::class,
            ruoliUtente_poteriUtente::class,
            utenti_ruoliUtente::class,
            Configurazioni::class,
            passwordsUtente::class,
            utenteAuth::class
        ]);
    }
}
