<?php

namespace Database\Factories;

use App\Models\Reticula;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    public function definition(): array
    {
        $materias = [
            'ISC' => [
                'semestre 1' => [
                    'Taller de Ética' => ['nombreMediano' => 'T. Ética', 'nombreCorto' => 'TE'],
                    'Fundamentos de Programación' => ['nombreMediano' => 'Fund. Prog.', 'nombreCorto' => 'FP'],
                    'Cálculo Diferencial' => ['nombreMediano' => 'Cálc. Dif.', 'nombreCorto' => 'CD'],
                ],
                'semestre 2' => [
                    'Cálculo Integral' => ['nombreMediano' => 'Cálc. Int.', 'nombreCorto' => 'CI'],
                    'Programación Orientada a Objetos' => ['nombreMediano' => 'Prog. OO', 'nombreCorto' => 'POO'],
                    'Álgebra Lineal' => ['nombreMediano' => 'Álg. Lin.', 'nombreCorto' => 'AL'],
                ],
                'semestre 3' => [
                    'Desarrollo Sustentable' => ['nombreMediano' => 'Des. Sust.', 'nombreCorto' => 'DS'],
                    'Estructura de Datos' => ['nombreMediano' => 'Estr. Datos', 'nombreCorto' => 'ED'],
                    'Cálculo Vectorial' => ['nombreMediano' => 'Cálc. Vec.', 'nombreCorto' => 'CV'],
                ],
                'semestre 4' => [
                    'Taller de Sistemas Operativos' => ['nombreMediano' => 'T. Sist. Op.', 'nombreCorto' => 'TSO'],
                    'Fundamentos de Bases de Datos' => ['nombreMediano' => 'Fund. BD', 'nombreCorto' => 'FBD'],
                    'Tópicos Avanzados de Programación' => ['nombreMediano' => 'Tóp. Av. Prog.', 'nombreCorto' => 'TAP'],
                ],
                'semestre 5' => [
                    'Arquitectura de Computadoras' => ['nombreMediano' => 'Arq. Comp.', 'nombreCorto' => 'AC'],
                    'Fundamentos de Ingeniería de Software' => ['nombreMediano' => 'Fund. Ing. Soft.', 'nombreCorto' => 'FIS'],
                    'Taller de Bases de Datos' => ['nombreMediano' => 'T. BD', 'nombreCorto' => 'TBD'],
                ],
                'semestre 6' => [
                    'Ingeniería de Software' => ['nombreMediano' => 'Ing. Soft.', 'nombreCorto' => 'IS'],
                    'Administración de Bases de Datos' => ['nombreMediano' => 'Adm. BD', 'nombreCorto' => 'ABD'],
                    'Programación Web' => ['nombreMediano' => 'Prog. Web', 'nombreCorto' => 'PW'],
                ],
                'semestre 7' => [
                    'Programación Web II' => ['nombreMediano' => 'Prog. Web II', 'nombreCorto' => 'PW2'],
                    'Taller de Investigación I' => ['nombreMediano' => 'T. Inv. I', 'nombreCorto' => 'TI1'],
                    'Cultura Empresarial' => ['nombreMediano' => 'Cult. Emp.', 'nombreCorto' => 'CE'],
                ],
                'semestre 8' => [
                    'Programación Lógica y Funcional' => ['nombreMediano' => 'Prog. Lóg. Func.', 'nombreCorto' => 'PLF'],
                    'Programación Móvil con Lenguaje Oficial' => ['nombreMediano' => 'Prog. Móvil Leng. Of.', 'nombreCorto' => 'PMLO'],
                    'Taller de Investigación II' => ['nombreMediano' => 'T. Inv. II', 'nombreCorto' => 'TI2'],
                ],
                'semestre 9' => [
                    'Residencia Profesional' => ['nombreMediano' => 'Res. Prof.', 'nombreCorto' => 'RP'],
                    'Inteligencia Artificial' => ['nombreMediano' => 'Int. Art.', 'nombreCorto' => 'IA'],
                    'Programación Móvil Multiplataforma' => ['nombreMediano' => 'Prog. Móvil Multiplat.', 'nombreCorto' => 'PMM'],
                ],
            ],
            'II' => [
                'semestre 1' => [
                    'Dibujo Industrial' => ['nombreMediano' => 'Dib. Ind.', 'nombreCorto' => 'DI'],
                    'Fundamentos de Investigación' => ['nombreMediano' => 'Fund. Inv.', 'nombreCorto' => 'FI'],
                ],
                'semestre 2' => [
                    'Análisis de la Realidad Nacional' => ['nombreMediano' => 'An. Real. Nac.', 'nombreCorto' => 'ARN'],
                    'Probabilidad y Estadística' => ['nombreMediano' => 'Prob. Est.', 'nombreCorto' => 'PE'],
                ],
                'semestre 3' => [
                    'Estadística Inferencial I' => ['nombreMediano' => 'Est. Inf. I', 'nombreCorto' => 'EI1'],
                    'Metrología y Normalización' => ['nombreMediano' => 'Metr. Norm.', 'nombreCorto' => 'MN'],
                ],
                'semestre 4' => [
                    'Procesos de Fabricación' => ['nombreMediano' => 'Proc. Fab.', 'nombreCorto' => 'PF'],
                    'Estadística Inferencial II' => ['nombreMediano' => 'Est. Inf. II', 'nombreCorto' => 'EI2'],
                ],
                'semestre 5' => [
                    'Gestión de Costos' => ['nombreMediano' => 'Gest. Costos', 'nombreCorto' => 'GC'],
                    'Administración de Proyectos' => ['nombreMediano' => 'Adm. Proy.', 'nombreCorto' => 'AP'],
                ],
                'semestre 6' => [
                    'Taller de Investigación I' => ['nombreMediano' => 'T. Inv. I', 'nombreCorto' => 'TI1'],
                    'Simulación' => ['nombreMediano' => 'Sim.', 'nombreCorto' => 'S'],
                ],
                'semestre 7' => [
                    'Planeación Financiera' => ['nombreMediano' => 'Plan. Fin.', 'nombreCorto' => 'PF'],
                    'Taller de Investigación II' => ['nombreMediano' => 'T. Inv. II', 'nombreCorto' => 'TI2'],
                ],
                'semestre 8' => [
                    'Seminario de Competitividad' => ['nombreMediano' => 'Sem. Comp.', 'nombreCorto' => 'SC'],
                    'Tópicos de Calidad' => ['nombreMediano' => 'Tóp. Calidad', 'nombreCorto' => 'TC'],
                ],
                'semestre 9' => [
                    'Medición y Mejoramiento de la Productividad' => ['nombreMediano' => 'Med. Mej. Prod.', 'nombreCorto' => 'MMP'],
                    'Manufactura Integrada Por Computadora' => ['nombreMediano' => 'Manuf. Int. Comp.', 'nombreCorto' => 'MIC'],
                ],
            ],
        ];
        
        // Selecciona solo las carreras ISC y II
        $carrera = $this->faker->randomElement(['ISC', 'II']);
        
        // Seleccionar un semestre aleatorio de la carrera seleccionada
        $semestre = $this->faker->randomElement(array_keys($materias[$carrera]));

        // Seleccionar una materia aleatoria dentro del semestre seleccionado
        $nombreMateria = $this->faker->randomElement(array_keys($materias[$carrera][$semestre]));
        
        // Obtener los detalles de la materia seleccionada
        $detallesMateria = $materias[$carrera][$semestre][$nombreMateria];

        // Niveles y modalidades posibles
        $nivel = ['L', 'M', 'D'];
        $modalidad = ['P', 'V', 'M'];

        return [
            'idMateria' => $this->faker->unique()->bothify("?????"),
            'nombreMateria' => $nombreMateria,
            'nivel' => $this->faker->randomElement($nivel),
            'nombreMediano' => $detallesMateria['nombreMediano'],
            'nombreCorto' => $detallesMateria['nombreCorto'],
            'modalidad' => $this->faker->randomElement($modalidad),
            'semestre' => $semestre,
            // Asocia la retícula correspondiente a la carrera seleccionada
            'idReticula' => Reticula::where('descripcion', 'Retícula ' . $carrera)->inRandomOrder()->first()->idReticula ?? Reticula::factory()->create()->idReticula,
        ];
    }
}
