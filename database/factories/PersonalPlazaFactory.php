<?php

namespace Database\Factories;

use App\Models\Plaza;
use App\Models\Personal;
use App\Models\PersonalPlaza;
use Illuminate\Database\Eloquent\Factories\Factory;


class PersonalPlazaFactory extends Factory
{
    protected $model = PersonalPlaza::class;
    
    public function definition(): array
    {   
        return [
           'idPersonal' => Personal::inRandomOrder()->first()->idPersonal ?? Personal::factory()->create()->idPersonal, 
           'idPlaza' => Plaza::inRandomOrder()->first()->idPlaza ?? Plaza::factory()->create()->idPlaza,        
            'tipoNombramiento' => fake()->numberBetween(10,20,95), 
        ];
    }
}
