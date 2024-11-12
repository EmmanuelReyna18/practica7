<?php

namespace Database\Factories;

use App\Models\Depto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $indice = -1;
        $indice++;

        $carreras = [
            ['Ingeniería en Sistemas Computacionales', 'Ing. en Sistemas', 'ISC'],
            ['Ingeniería Electrónica', 'Ing. Eléctrica', 'IE'],
            ['Ingeniería Mecánica', 'Ing. Mecánica', 'IM'],
            ['Ingeniería Industrial', 'Ing. Industrial', 'II'],
            ['Contaduría Pública', 'Cont. Pública', 'CP'],
            ['Ingeniería en Gestión Empresarial', 'Ing. Gestión', 'IGE'],
            ['Ingeniería en Mecatrónica', 'Ing. Mecatrónica', 'IMT'],
        ];

        $carrera = $carreras[$indice];

        return [
            'idCarrera' => $this->faker->bothify("????####"),
            'nombreCarrera' => $carrera[0],
            'nombreMediano' => $carrera[1],
            'nombreCorto' => $carrera[2],
            'idDepto' => Depto::factory(),  // Asigna un ID de un departamento generado por la factory de Depto
        ];
    }
}
