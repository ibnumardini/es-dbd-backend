<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\MedicalRecord;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function overview(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'my_medical_records' => MedicalRecord::where('user_id', $user->id)->count(),
        ]);
    }
}
