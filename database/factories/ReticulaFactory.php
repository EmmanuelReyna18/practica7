<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrera;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reticula>
 */
class ReticulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $indice = 0;

        // Lista de descripciones de retículas
        $descripciones = [
            'Retícula ISC',
            'Retícula IE',
            'Retícula IM',
            'Retícula II',
            'Retícula CP',
            'Retícula IGE',
            'Retícula IMT',
        ];

        // Seleccionar la descripción según el índice y hacer que se recorra
        $descripcion = $descripciones[$indice % count($descripciones)];
        $indice++; // Incrementar para la siguiente llamada

        return [
            'idReticula' => fake()->bothify("????"),  // Generar un ID de retícula aleatorio
            'descripcion' => $descripcion,  // Asignar la descripción de la retícula
            'fechaEnVigor' => fake()->date('Y-m-d'),  // Fecha en vigor
            'idCarrera' => Carrera::inRandomOrder()->first()->idCarrera ?? Carrera::factory()->create()->idCarrera, // Asociar con una carrera
        ];
    }
}
