<?php

namespace Database\Factories;

use App\Models\Hora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hora>
 */
class HoraFactory extends Factory
{
    protected $model = Hora::class;

    
    public function definition(): array
    {
      
        $horaInicio = $this->faker->time('H:00:00');
        $horaFin = date('H:i:s', strtotime($horaInicio) + 3600); 

        return [
            'idHora' => $this->faker->unique()->bothify('####'),
            'horaIni' => $horaInicio,
            'horaFin' => $horaFin,
        ];
    }
}
