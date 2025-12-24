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

        foreach ($ruleGroups as $code => $rules) {
            $disease = $rules->first()->disease;
            
            // Group rules by logical operator
            $andRules = $rules->where('logical_operator', 1);
            $orRules = $rules->where('logical_operator', 0);
            
            // Check AND conditions (all must match)
            $andSymptomIds = $andRules->pluck('symptom_id')->toArray();
            $andMatch = empty($andSymptomIds) || empty(array_diff($andSymptomIds, $userSymptomIds));
            
            // Check OR conditions (at least one must match)
            $orSymptomIds = $orRules->pluck('symptom_id')->toArray();
            $orMatch = empty($orSymptomIds) || !empty(array_intersect($orSymptomIds, $userSymptomIds));
            
            // If both conditions are satisfied, return the disease
            if ($andMatch && $orMatch) {
                return $disease;
            }
        }

        return null;
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
