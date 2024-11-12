<?php

namespace Database\Factories;

use App\Models\Depto;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $personal = [    
            //DOCENTES
            ['RFC' => 'ENWE758208V2', 'nombre' => 'FLOR DE MARÍA','apellidoP'=>'RIVERA', 'apellidoM'=>'SÁNCHEZ',  'tipo' => 'Docente'],
            ['RFC' => 'HJBF7126395Q', 'nombre' => 'ROBERTO','apellidoP'=>'ESPINOZA', 'apellidoM'=>'TORRES',  'tipo' => 'Docente'],
            ['RFC' => 'MPLW3625189A', 'nombre' => 'ANTONIO','apellidoP'=>'CHÁVEZ', 'apellidoM'=>'SÁNCHEZ', 'tipo' => 'Docente'],
            ['RFC' => 'JHFG8291742Z', 'nombre' => 'ROGELIO CESAR','apellidoP'=>'RODRIGUEZ', 'apellidoM'=>'CERVANTES', 'tipo' => 'Docente'],
            ['RFC' => 'BLFR4837265H', 'nombre' => 'MIGUEL ARTURO','apellidoP'=>'VELEZ', 'apellidoM'=>'RIOJAS', 'tipo' => 'Docente'],
            ['RFC' => 'QNWD5901748E', 'nombre' => 'HECTOR','apellidoP'=>'CHAVEZ', 'apellidoM'=>'CASTELLANOS', 'tipo' => 'Docente'],
            ['RFC' => 'KLPT2039476Y', 'nombre' => 'WILBER ELIUD','apellidoP'=>'GARCIA', 'apellidoM'=>'VILLAREAL', 'tipo' => 'Docente'],
            ['RFC' => 'VXZH3810274L', 'nombre' => 'DAVID SERGIO','apellidoP'=>'CASTILLON', 'apellidoM'=>'DOMINGUEZ', 'tipo' => 'Docente'],
            ['RFC' => 'CWKN5248193D', 'nombre' => 'HILDA PATRICIA','apellidoP'=>'BLETRAN', 'apellidoM'=>'HERNANDEZ ', 'tipo' => 'Docente'],
            ['RFC' => 'ABJF89206395A', 'nombre' => 'ROGELIO CESAR','apellidoP'=>'RODRIGUEZ', 'apellidoM'=>'GONZALEZ', 'tipo' => 'Docente'],
            //SUBDIRECCION
            ['RFC' => 'GOPA760101MRA', 'nombre' => 'ULISES', 'apellidoP'=>'VALDEZ', 'apellidoM'=>'RODRIGUEZ','tipo' => 'Subdireccion'],
            ['RFC' => 'CAJR870213HV3', 'nombre' => 'CARLOS', 'apellidoP'=>'PATIÑO', 'apellidoM'=>'CHAVEZ','tipo' => 'Subdireccion'],
            ['RFC' => 'LODM920405NMA', 'nombre' => 'AIDA', 'apellidoP'=>'HERNANDEZ', 'apellidoM'=>'ÁVILA', 'tipo' => 'Subdireccion'],
        ];

        
  // Selecciona aleatoriamente un personal único del array
  $personal = $this->faker->unique()->randomElement($personal);

 
  return [
      'idPersonal' => fake()->unique()->bothify('####'),
      'RFC' => $personal['RFC'],
      'nombre' => $personal['nombre'],
      'apellidoP' => $personal['apellidoP'],
      'apellidoM' => $personal['apellidoM'],
      'licenciatura' => fake()->jobTitle(),
      'lictit' => fake()->boolean(),
      'especializacion' => fake()->optional()->jobTitle(),
      'esptit' => fake()->boolean(),
      'maestria' => fake()->optional()->jobTitle(),
      'maetit' => fake()->boolean(),
      'doctorado' => fake()->optional()->jobTitle(),
      'doctit' => fake()->boolean(),
      'fechaIngSep' => fake()->date(),
      'fechaIngIns' => fake()->date(),
      'idDepto' => Depto::inRandomOrder()->first()->idDepto ?? Depto::factory()->create()->idDepto,
      'idPuesto' => Puesto::inRandomOrder()->first()->idPuesto ?? Puesto::factory()->create()->idPuesto,
    ];
}
}
