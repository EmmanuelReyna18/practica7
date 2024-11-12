<?php

namespace Database\Factories;

use App\Models\Edificio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EdificioFactory extends Factory
{
    protected $model = Edificio::class;

    public function definition(): array
    {
       
        $edificios = [
            ['nombreCompleto' => 'Edificio K', 'nombreCorto' => 'K'],
            ['nombreCompleto' => 'Edificio D', 'nombreCorto' => 'D'],
            ['nombreCompleto' => 'Edificio H', 'nombreCorto' => 'H'],
            ['nombreCompleto' => 'Edificio J', 'nombreCorto' => 'J'],
            ['nombreCompleto' => 'Edificio Sistemas', 'nombreCorto' => 'Sis'],
            ['nombreCompleto' => 'Edificio Electronica', 'nombreCorto' => 'Ele'],
            ['nombreCompleto' => 'Edificio Ciencias Basicas', 'nombreCorto' => 'CB'],
          
        ];
 
       

        // Selecciona aleatoriamente un edificio de la lista
        $edificio = $this->faker->unique()->randomElement($edificios);

        return [
            'idEdificio' => $this->faker->unique()->bothify('####'),
            'nombreEdificio' => $edificio['nombreCompleto'],
            'nombreCorto' => $edificio['nombreCorto'],
            
        ];
    }
}
