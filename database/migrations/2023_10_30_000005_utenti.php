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
        Schema::create('utenti', function(Blueprint $table){
            $table->id('idUtente');
            $table->unsignedBigInteger('idStato');
            $table->string('nome', 45);
            $table->string('cognome');
            $table->tinyInteger('sesso');  //0 femmina     1 maschio
            $table->string('codiceFiscale');
            // $table->string('prova');
            $table->string('cittadinanza');
            $table->date('dataNascita');
            $table->integer('credito')->nullable();

            $table->datetimes();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utenti');
    }
};