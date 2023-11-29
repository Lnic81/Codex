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
        Schema::create('utentiAuth', function(Blueprint $table){
            $table->id ('idUtenteAuth');
            $table->unsignedBigInteger('idUtente');
            $table->string('user');
            $table->string('sfida');
            $table->string('secretJWT');
            $table->string('inizioSfida');
            $table->string('obbligoCambio');

            $table->timestamps();
            $table->softDeletes();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utentiAuth');
    }
};