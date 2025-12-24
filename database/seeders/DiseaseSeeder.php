<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diseases = [
            ['code' => 'P1', 'name' => 'Dengue Fever (DF)'],
            ['code' => 'P2', 'name' => 'Dengue Hemorrhagic Fever (DHF) Grade 1'],
            ['code' => 'P3', 'name' => 'Dengue Hemorrhagic Fever (DHF) Grade 2'],
            ['code' => 'P4', 'name' => 'Dengue Hemorrhagic Fever (DHF) Grade 3 atau Dengue Shock Syndrome (DSS)'],
            ['code' => 'F', 'name' => 'Premis Tidak Terpenuhi'],
        ];

        foreach ($diseases as $disease) {
            \App\Models\Disease::create($disease);
        }
    }
}
