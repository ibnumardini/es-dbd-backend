<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedicalRecord extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userSymptoms(): HasMany
    {
        return $this->hasMany(UserSymptom::class);
    }

    public function symptoms()
    {
        return $this->hasManyThrough(Symptom::class, UserSymptom::class, 'medical_record_id', 'id', 'id', 'symptom_id');
    }

    /**
     * Diagnose disease based on user symptoms and rules
     */
    public function diagnoseDiseaseFromSymptoms(): ?Disease
    {
        // Get user's symptom IDs
        $userSymptomIds = $this->userSymptoms()->pluck('symptom_id')->toArray();

        if (empty($userSymptomIds)) {
            return null;
        }

        // Get all rules grouped by code and disease
        $ruleGroups = Rule::with('disease')
            ->get()
            ->groupBy('code');

        $matchedDiseases = [];

        foreach ($ruleGroups as $code => $rules) {
            $disease = $rules->first()->disease;

            // Get all symptom IDs required for this rule code
            $requiredSymptomIds = $rules->pluck('symptom_id')->toArray();

            // Check if all required symptoms are present in the user's symptoms (AND logic)
            $isMatch = !empty($requiredSymptomIds) && empty(array_diff($requiredSymptomIds, $userSymptomIds));

            // If all symptoms match, store the disease with its symptom count
            if ($isMatch) {
                $matchedDiseases[] = [
                    'disease' => $disease,
                    'symptom_count' => count($requiredSymptomIds)
                ];
            }
        }

        // If no matches found, return null
        if (empty($matchedDiseases)) {
            return null;
        }

        // Sort by symptom count descending to get the most specific diagnosis
        usort($matchedDiseases, function ($a, $b) {
            return $b['symptom_count'] <=> $a['symptom_count'];
        });

        // Return the disease with the most symptoms (most specific)
        return $matchedDiseases[0]['disease'];
    }

    /**
     * Get diagnosed disease name with code
     */
    public function getDiagnosedDiseaseName(): string
    {
        $disease = $this->diagnoseDiseaseFromSymptoms();
        
        if (!$disease) {
            // Get the "F - Premis Tidak Terpenuhi" disease from database
            $disease = Disease::where('code', 'F')->first();
        }
        
        return $disease ? "{$disease->code} - {$disease->name}" : 'Not Diagnosed';
    }
}
