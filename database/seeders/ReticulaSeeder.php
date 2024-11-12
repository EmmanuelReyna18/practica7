<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reticula;
use App\Models\Carrera;

class ReticulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtiene todas las carreras y crea una retícula para cada una
        $carreras = Carrera::all();

        foreach ($carreras as $carrera) {
            Reticula::factory()->create([
                'idCarrera' => $carrera->idCarrera,
            ]);
        }
    }
}
