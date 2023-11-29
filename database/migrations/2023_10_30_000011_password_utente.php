<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpMyAdmin\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('passwordUtente', function(Blueprint $table){
            $table->id('idPasswordUtente');
            $table->unsignedBigInteger('idUtente');
            $table->string('psw');
            $table->string('sale');
            
            $table->timestamps();
            $table->softDeletes();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passwordUtente');
    }
};