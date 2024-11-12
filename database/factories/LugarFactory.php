<?php

namespace Database\Factories;

use App\Models\Lugar;
use App\Models\Edificio;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrera;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lugar>
 */
class LugarFactory extends Factory
{
    protected $model = Lugar::class;

    
    public function definition(): array
    {
        $lugares = [
            ['lugar' => 'salon 1K', 'nombreCorto' => '1K'],
            ['lugar' => 'salon 2K', 'nombreCorto' => '2K'],
            ['lugar' => 'salon 3K', 'nombreCorto' => '3K'],
            ['lugar' => 'salon 4K', 'nombreCorto' => '4K'],
            ['lugar' => 'salon 5K', 'nombreCorto' => '5K'],
            ['lugar' => 'salon 6K', 'nombreCorto' => '6K'],
            ['lugar' => 'salon 7K', 'nombreCorto' => '7K'],
            ['lugar' => 'salon 8K', 'nombreCorto' => '8K'],
            ['lugar' => 'salon 9K', 'nombreCorto' => '9K'],
            ['lugar' => 'salon 10K','nombreCorto' => '10K'],
            ['lugar' => 'salon 11K','nombreCorto' => '11K'],
            ['lugar' => 'salon 12K','nombreCorto' => '12K'],
            ['lugar' => 'salon 1D', 'nombreCorto' => '1D'],
            ['lugar' => 'salon 2D', 'nombreCorto' => '2D'],
            ['lugar' => 'salon 3D', 'nombreCorto' => '3D'],
            ['lugar' => 'salon 4D', 'nombreCorto' => '4D'],
            ['lugar' => 'salon 5D', 'nombreCorto' => '5D'],
            ['lugar' => 'salon 6D', 'nombreCorto' => '6D'],
            ['lugar' => 'salon 7D', 'nombreCorto' => '7D'],
            ['lugar' => 'salon 8D', 'nombreCorto' => '8D'],
            ['lugar' => 'salon 9D', 'nombreCorto' => '9D'],
   
        ];

        $lugares = $this->faker->unique()->randomElement($lugares);
        return [
            'idLugar' => $this->faker->unique()->bothify('####'),

            'nombreLugar' => $lugares['lugar'],
            'nombreCorto' => $lugares['nombreCorto'],

            'idEdificio' => Edificio::inRandomOrder()->first()->idEdificio ?? Edificio::factory()->create()->idEdificio,

        ];
    }
}
