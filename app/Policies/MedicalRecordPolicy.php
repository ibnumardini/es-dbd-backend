<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MedicalRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalRecordPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_ANY_MEDICAL_RECORD);
    }

    public function view(AuthUser $authUser, MedicalRecord $medicalRecord): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_MEDICAL_RECORD);
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::CREATE_MEDICAL_RECORD);
    }

    public function update(AuthUser $authUser, MedicalRecord $medicalRecord): bool
    {
        return $authUser->can(\App\Constants\Permission::UPDATE_MEDICAL_RECORD);
    }

    public function delete(AuthUser $authUser, MedicalRecord $medicalRecord): bool
    {
        return $authUser->can(\App\Constants\Permission::DELETE_MEDICAL_RECORD);
    }

    public function restore(AuthUser $authUser, MedicalRecord $medicalRecord): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_MEDICAL_RECORD);
    }

    public function forceDelete(AuthUser $authUser, MedicalRecord $medicalRecord): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_MEDICAL_RECORD);
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_ANY_MEDICAL_RECORD);
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_ANY_MEDICAL_RECORD);
    }

    public function replicate(AuthUser $authUser, MedicalRecord $medicalRecord): bool
    {
        return $authUser->can(\App\Constants\Permission::REPLICATE_MEDICAL_RECORD);
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::REORDER_MEDICAL_RECORD);
    }

}