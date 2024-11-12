<?php
namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener las 5 carreras (puedes ajustarlo según lo que necesites)
        $carreras = Carrera::all()->take(5); // Ajusta este número si quieres más o menos carreras

        // Asignar 5 alumnos por carrera
        foreach ($carreras as $carrera) {
            Alumno::factory(5)->create([
                'idCarrera' => $carrera->idCarrera, // Asignar carrera a cada alumno
            ]);
        }
    }
}
