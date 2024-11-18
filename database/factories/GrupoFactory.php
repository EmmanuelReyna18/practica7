<?php

namespace Database\Factories;

use App\Models\Hora;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoFactory extends Factory
{
    protected $model = Hora::class;

    public function definition()
    {
        // return [
        //     'idGrupo' => $this->faker->unique()->bothify('#####'),
        //     'grupo' => $this->faker->word(),
        //     'descripcion' => $this->faker->sentence(),
        //     'maxAlumnos' => $this->faker->numberBetween(20, 40),
        //     // Generar un id aleatorio para las claves foráneas
        //     'idPeriodo' => Periodo::factory(),
        //     'idMateria' => Materia::factory(),
        //     'idPersonal' => Personal::inRandomOrder()->first()->idPersonal ?? Personal::factory()->create()->idPersonal, 

        //     //seleccion de fk con datos que esten relacionadas
        //     // 'idMateria' => Materia::inRandomOrder()->first()->idMateria,
        // ];
    }
}
