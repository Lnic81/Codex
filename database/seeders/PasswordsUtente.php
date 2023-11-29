<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PasswordUtente;

class passwordsUtente extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PasswordUtente::create([
            "idPasswordUtente"=>1,
            "idUtente"=>1,
            "psw"=>hash("sha512", trim("MyFriend!")),
            "sale"=>hash("sha512", trim("Hello!"))
        ]);
    }
}