<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $date = '2025-12-23 00:00:00'; // Using user provided date for consistency

        $rules = [
            // R1 - P1 (Disease ID 1)
            ['code' => 'R1', 'symptom_id' => 1, 'disease_id' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R1', 'symptom_id' => 2, 'disease_id' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R1', 'symptom_id' => 4, 'disease_id' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R1', 'symptom_id' => 7, 'disease_id' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R1', 'symptom_id' => 9, 'disease_id' => 1, 'created_at' => $date, 'updated_at' => $date],

            // R2 - P2 (Disease ID 2)
            ['code' => 'R2', 'symptom_id' => 1, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 2, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 3, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 5, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 7, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 8, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 9, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 13, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 14, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 15, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R2', 'symptom_id' => 16, 'disease_id' => 2, 'created_at' => $date, 'updated_at' => $date],

            // R3 - P3 (Disease ID 3)
            ['code' => 'R3', 'symptom_id' => 1, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 2, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 3, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 4, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 6, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 7, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 8, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 9, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 13, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 14, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 15, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R3', 'symptom_id' => 16, 'disease_id' => 3, 'created_at' => $date, 'updated_at' => $date],

            // R4 - P4 (Disease ID 4)
            ['code' => 'R4', 'symptom_id' => 1, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 2, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 3, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 4, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 6, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 7, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 8, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 9, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 10, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 11, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 12, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 13, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 14, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 15, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 16, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 17, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
            ['code' => 'R4', 'symptom_id' => 18, 'disease_id' => 4, 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('rules')->truncate();
        DB::table('rules')->insert($rules);
    }
}
