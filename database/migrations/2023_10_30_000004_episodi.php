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
        Schema::create('episodi', function (Blueprint $table){
            $table->id('idEpisodio');
            $table->string('titolo', 145);
            $table->string('serieTv');
            $table->tinyInteger('durata');
            $table->tinyInteger('stagione');
            $table->Integer('episodio');
            $table->year('anno');
            $table->text('trama');
            $table->string('trailer')->nullable();
            $table->string('fotoAnteprima')->nullable();


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodi');
    }
};