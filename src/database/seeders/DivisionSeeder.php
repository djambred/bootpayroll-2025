<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::firstOrCreate([
            'name' => 'HRD',
        ]);
        Division::firstOrCreate([
            'name' => 'IT',
        ]);
    }
}
