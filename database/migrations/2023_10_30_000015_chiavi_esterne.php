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
        //QUESTE NON SONO RIUSCITO A FARLE
        // Schema::table('utenti', function(Blueprint $table){
        //     $table->foreign("idRuoloUtente")->references("idRuoloUtente")->on("ruoliUtente");
        // });
        Schema::table('utentiAuth', function(Blueprint $table){
            $table->foreign("idUtente")->references("idUtente")->on("utenti");
        });
        Schema::table('passwordUtente', function(Blueprint $table){
            $table->foreign("idUtente")->references("idUtente")->on("utenti");
        });
        Schema::table('accessoUtenti', function(Blueprint $table){
            $table->foreign("idUtente")->references("idUtente")->on("utenti");
        });
        Schema::table('sessioniUtente', function(Blueprint $table){
            $table->foreign("idUtente")->references("idUtente")->on("utenti");
        });
        Schema::table('utenti_ruoliUtente', function(Blueprint $table){
            $table->foreign('idUtente')->references('idUtente')->on('utenti');
        });
        Schema::table('utenti_ruoliUtente', function(Blueprint $table){
        $table->foreign('idRuoloUtente')->references('idRuoloUtente')->on('ruoliUtente');
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utentiAuth', function(Blueprint $table){
            $table->dropForeign(['idUtente']);
            $table->dropColumn('utenti');
        });
        Schema::table('passwordUtente', function(Blueprint $table){
            $table->dropForeign(['idUtente']);
            $table->dropColumn('utenti');
        });
        Schema::table('accessoUtenti', function(Blueprint $table){
            $table->dropForeign(['idUtente']);
            $table->dropColumn('utenti');
        });
        Schema::table('sessioniUtente', function(Blueprint $table){
            $table->dropForeign(['idUtente']);
            $table->dropColumn('utenti');
        });
        Schema::table('utenti_ruoliUtente', function(Blueprint $table){
            $table->dropForeign(['idUtente']);
            $table->dropColumn('utenti');
        });
        Schema::table('utenti_ruoliUtente', function(Blueprint $table){
            $table->dropForeign(['idRuoloUtente']);
            $table->dropColumn('ruoliUtente');
        });
    }
};