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
        Schema::create('materia_abiertas', function (Blueprint $table) {
            $table->id('idMateriaAbierta');
            $table->string('idMateria');
            $table->string('idPeriodo');

            
            $table->timestamps();

            $table->foreign('idMateria')->references('idMateria')->on('materias');
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos'); 
        });

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_abiertas');
    }
};
