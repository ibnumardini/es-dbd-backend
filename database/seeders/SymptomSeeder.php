<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $symptoms = [
            ['code' => 'G01', 'name' => 'Demam / Demam naik turun'],
            ['code' => 'G02', 'name' => 'Mual'],
            ['code' => 'G03', 'name' => 'Muntah'],
            ['code' => 'G04', 'name' => 'Bintik-bintik merah (Ruam)'],
            ['code' => 'G05', 'name' => 'Perut kembung'],
            ['code' => 'G06', 'name' => 'Mimisan (Pendarahan spontan)'],
            ['code' => 'G07', 'name' => 'Nyeri sendi'],
            ['code' => 'G08', 'name' => 'Lemas'],
            ['code' => 'G09', 'name' => 'Nafsu makan hilang'],
            ['code' => 'G10', 'name' => 'Penurunan tekanan darah'],
            ['code' => 'G11', 'name' => 'Pendarahan saluran cerna'],
            ['code' => 'G12', 'name' => 'Sulit bernapas'],
            ['code' => 'G13', 'name' => 'Penurunan trombosit'],
            ['code' => 'G14', 'name' => 'Hematokrit meningkat'],
            ['code' => 'G15', 'name' => 'Leukosit turun'],
            ['code' => 'G16', 'name' => 'Nyeri ulu hati'],
            ['code' => 'G17', 'name' => 'Mencret (diare)'],
            ['code' => 'G18', 'name' => 'Sakit kepala berat'],
        ];

        foreach ($symptoms as $symptom) {
            \App\Models\Symptom::create($symptom);
        }
    }
}
