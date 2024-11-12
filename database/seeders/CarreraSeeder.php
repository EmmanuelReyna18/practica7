<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 7 carreras (según las que definiste en tu factory)
        Carrera::factory(7)->create()->each(function ($carrera) {
            // Asociar el departamento con la carrera después de crear la carrera
            $depto = Depto::factory()->create();
            $carrera->idDepto = $depto->idDepto;
            $carrera->save();
        });
    }
}
