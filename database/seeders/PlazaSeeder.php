<?php

namespace Database\Seeders;

use App\Models\Plaza;
use Illuminate\Database\Seeder;

class PlazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plazas = [
            ['idPlaza' => 'E3817', 'nombrePlaza' => 'Plaza E3817'],
            ['idPlaza' => 'E3815', 'nombrePlaza' => 'Plaza E3815'],
            ['idPlaza' => 'E3717', 'nombrePlaza' => 'Plaza E3717'],
            ['idPlaza' => 'E3617', 'nombrePlaza' => 'Plaza E3617'],
            ['idPlaza' => 'E3520', 'nombrePlaza' => 'Plaza E3520'],
        ];

        foreach ($plazas as $plaza) {
            Plaza::create($plaza);
        }
    }
}
