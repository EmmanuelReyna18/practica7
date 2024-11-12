<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeptoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // Modificación en DeptoFactory
public function definition(): array
{
    static $indice = 0;  // Reiniciar el índice en cada ejecución

    // Lista de departamentos (sin repetidos)
    $deptos = [
        ['Ing. en Sistemas Computacionales', 'Sistemas Comp.', 'ISC'],
        ['Ing. en Electrónica', 'Electrónica', 'IE'],
        ['Ing. Mecánica', 'Mecánica', 'IM'],
        ['Ing. Industrial', 'Industrial', 'II'],
        ['Ing. en Gestión Empresarial', 'Gestión Emp.', 'IGE'],
        ['Contador Público', 'Contaduría', 'CP'],
        ['Ing. Mecatrónica', 'Mecatrónica', 'IMT'],
        ['Dirección', 'Dirección', 'DIR'],
        ['Subdirección', 'Subdirección', 'SUB'],
        ['Ciencias Básicas', 'Ciencias Bás.', 'CB'],
    ];

    $depto = $deptos[$indice % count($deptos)];

    $indice++;  // Incrementar el índice

    return [
        'idDepto' => $this->faker->unique()->bothify("???####"),
        'nombreDepto' => $depto[0],
        'nombreMediano' => $depto[1],
        'nombreCorto' => $depto[2],
    ];
}
}