<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MedicalRecordController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $records = MedicalRecord::with(['user:id,name,code,date_of_birth', 'userSymptoms.symptom:id,name,code'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $formatted = $records->map(function ($record) {
            return [
                'id' => $record->id,
                'patient_code' => $record->user->code,
                'patient_name' => $record->user->name,
                'patient_age' => $record->user->age,
                'diagnosed_disease' => Str::limit($record->getDiagnosedDiseaseName(), 50),
                'checkup_at' => $record->created_at->toDateTimeString(),
                'symptoms' => $record->userSymptoms->map(fn($us) => "{$us->symptom->code} - {$us->symptom->name}")->values(),
            ];
        });

        return response()->json($formatted);
    }

    public function store(Request $request)
    {
        $request->validate([
            'symptom_ids' => 'required|array',
            'symptom_ids.*' => 'exists:symptoms,id',
        ]);

        $user = $request->user();

        $record = MedicalRecord::create([
            'user_id' => $user->id,
        ]);

        foreach ($request->symptom_ids as $symptomId) {
            $record->userSymptoms()->create([
                'symptom_id' => $symptomId,
            ]);
        }

        $record->load('user:id,name,code,date_of_birth');

        return response()->json([
            'message' => 'Medical record created successfully',
            'record' => [
                'id' => $record->id,
                'patient_code' => $record->user->code,
                'patient_name' => $record->user->name,
                'patient_age' => $record->user->age,
                'diagnosed_disease' => $record->getDiagnosedDiseaseName(),
                'diagnosed_disease_limit' => Str::limit($record->getDiagnosedDiseaseName(), 50),
                'checkup_at' => $record->created_at->toDateTimeString(),
            ]
        ], 201);
    }
}
