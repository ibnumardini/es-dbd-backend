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
            // R1 - Disease 1
            ['id' => 1, 'code' => 'R1', 'symptom_id' => 1, 'disease_id' => 1, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 2, 'code' => 'R1', 'symptom_id' => 2, 'disease_id' => 1, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 3, 'code' => 'R1', 'symptom_id' => 3, 'disease_id' => 1, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 4, 'code' => 'R1', 'symptom_id' => 4, 'disease_id' => 1, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 5, 'code' => 'R1', 'symptom_id' => 5, 'disease_id' => 1, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],

            // R2 - Disease 2
            ['id' => 6, 'code' => 'R2', 'symptom_id' => 1, 'disease_id' => 2, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 7, 'code' => 'R2', 'symptom_id' => 2, 'disease_id' => 2, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 8, 'code' => 'R2', 'symptom_id' => 3, 'disease_id' => 2, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 9, 'code' => 'R2', 'symptom_id' => 4, 'disease_id' => 2, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 10, 'code' => 'R2', 'symptom_id' => 5, 'disease_id' => 2, 'logical_operator' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 11, 'code' => 'R2', 'symptom_id' => 6, 'disease_id' => 2, 'logical_operator' => 0, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 12, 'code' => 'R2', 'symptom_id' => 7, 'disease_id' => 2, 'logical_operator' => 0, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 13, 'code' => 'R2', 'symptom_id' => 8, 'disease_id' => 2, 'logical_operator' => 0, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 14, 'code' => 'R2', 'symptom_id' => 9, 'disease_id' => 2, 'logical_operator' => 0, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 15, 'code' => 'R2', 'symptom_id' => 10, 'disease_id' => 2, 'logical_operator' => 0, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 16, 'code' => 'R2', 'symptom_id' => 11, 'disease_id' => 2, 'logical_operator' => 0, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 17, 'code' => 'R2', 'symptom_id' => 12, 'disease_id' => 2, 'logical_operator' => 0, 'created_at' => $date, 'updated_at' => $date],
            ['id' => 18, 'code' => 'R2', 'symptom_id' => 13, 'disease_id' => 2, 'logical_operator' => 0, 'created_at' => $date, 'updated_at' => $date],
            
            // R3 - Disease 3 (Sample)
            // Assuming logical_operator 1 (AND) for simplicity or mixed if valid
            ['id' => 19, 'code' => 'R3', 'symptom_id' => 2, 'disease_id' => 3, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 20, 'code' => 'R3', 'symptom_id' => 4, 'disease_id' => 3, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 21, 'code' => 'R3', 'symptom_id' => 14, 'disease_id' => 3, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 22, 'code' => 'R3', 'symptom_id' => 15, 'disease_id' => 3, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],

            // R4 - Disease 4 (Sample)
            ['id' => 23, 'code' => 'R4', 'symptom_id' => 1, 'disease_id' => 4, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 24, 'code' => 'R4', 'symptom_id' => 14, 'disease_id' => 4, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 25, 'code' => 'R4', 'symptom_id' => 16, 'disease_id' => 4, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 26, 'code' => 'R4', 'symptom_id' => 17, 'disease_id' => 4, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 27, 'code' => 'R4', 'symptom_id' => 18, 'disease_id' => 4, 'logical_operator' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('rules')->insertOrIgnore($rules);
    }
}
