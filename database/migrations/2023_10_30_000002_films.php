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
        Schema::create('Film', function (Blueprint $table){
            $table->id('idFilm');
            $table->string('titolo', 145);
            $table->unsignedTinyInteger('durata');
            $table->string('regista', 60);
            $table->string('categoria', 145);
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
        Schema::dropIfExists('Film');
    }
};