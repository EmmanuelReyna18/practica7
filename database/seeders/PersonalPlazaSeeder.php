<?php

namespace Database\Seeders;

use App\Models\PersonalPlaza;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonalPlazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        PersonalPlaza::factory()->count(13)->create();
    }
}
