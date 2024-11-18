<?php

namespace Database\Factories;

use App\Models\Grupo;
use App\Models\Lugar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GrupoHorario>
 */
class GrupoHorarioFactory extends Factory
{
    public function definition()
    {
        return [
            'idGrupoHorario' => $this->faker->unique()->bothify('#####'),
            'dia' => $this->faker->dayOfWeek(),
            'hora' => $this->faker->time('H:i'), // Hora aleatoria

            // Claves foráneas
            'idGrupo' => Grupo::inRandomOrder()->first()->idGrupo ?? Grupo::factory()->create()->idGrupo, // Relación con Grupo
            'idLugar' => Lugar::inRandomOrder()->first()->idLugar ?? Lugar::factory()->create()->idLugar, // Relación con Lugar
        ];
    }
}
