<?php

namespace Database\Factories;

use App\Models\Materia;
use App\Models\MateriaAbierta;
use App\Models\Periodo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MateriaAbierta>
 */
class MateriaAbiertaFactory extends Factory
{
   
    protected $model = MateriaAbierta::class;
    
    public function definition(): array
    {
        return [
            'idMateria' => Materia::factory(),  
            'idPeriodo' => Periodo::factory(),       
            
        ];
    }

}
