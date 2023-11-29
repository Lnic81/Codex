<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fatturazione', function(Blueprint $table){
            $table->id('idFatturazione');
            $table->unsignedBigInteger('idUtente');
            $table->string('citta');
            $table->string('domicilio');
            $table->string('cittadinanza');
            $table->string('lingua');
            $table->string('metodoPagamento');
            $table->string('ragioneSociale');


            
            $table->timestamps();

            $table->foreign("idUtente")->references("idUtente")->on("utenti");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fatturazione');
    }
};