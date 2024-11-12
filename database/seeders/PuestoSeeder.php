<?php

namespace Database\Seeders;

use App\Models\Puesto;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tipos de puesto que quieres crear
        $tiposPuestos = ['Docente', 'Direccion', 'Administrativo', 'No Docente', 'Auxiliar'];

        // Crear 3 puestos para cada tipo
        foreach ($tiposPuestos as $tipo) {
            Puesto::factory()->count(3)->create([
                'tipo' => $tipo,
            ]);
        }
    }
}
