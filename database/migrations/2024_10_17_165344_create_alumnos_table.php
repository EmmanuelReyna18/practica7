<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('noctrl', 8)->primary();
            $table->String('nombre',50);
            $table->String('apellidoP',50);
            $table->String('apellidoM',50);
            $table->String('sexo',1);
            //FK
            $table->string('idCarrera',15);
            $table->foreign('idCarrera')->references('idCarrera')->on('carreras');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
