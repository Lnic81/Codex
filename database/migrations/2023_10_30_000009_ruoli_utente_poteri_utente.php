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
        {
            Schema::create('ruoliUtente_poteriUtente', function(Blueprint $table){
                $table->id("id");
                $table->unsignedBigInteger("idRuoloUtente");
                $table->unsignedBigInteger("idPotereUtente");
    
                $table->datetimes();
                $table->softDeletes();


                // $table->foreign('idRuoloUtente')->references('idRuoloUtente')->on('ruoliUtente');
                // $table->foreign('idPotereUtente')->references('idPotereUtente')->on('poteriUtente');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruoliUtente_poteriUtente');
    }
};