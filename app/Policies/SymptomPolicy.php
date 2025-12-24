<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Symptom;
use Illuminate\Auth\Access\HandlesAuthorization;

class SymptomPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_ANY_SYMPTOM);
    }

    public function view(AuthUser $authUser, Symptom $symptom): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_SYMPTOM);
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::CREATE_SYMPTOM);
    }

    public function update(AuthUser $authUser, Symptom $symptom): bool
    {
        return $authUser->can(\App\Constants\Permission::UPDATE_SYMPTOM);
    }

    public function delete(AuthUser $authUser, Symptom $symptom): bool
    {
        return $authUser->can(\App\Constants\Permission::DELETE_SYMPTOM);
    }

    public function restore(AuthUser $authUser, Symptom $symptom): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_SYMPTOM);
    }

    public function forceDelete(AuthUser $authUser, Symptom $symptom): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_SYMPTOM);
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_ANY_SYMPTOM);
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_ANY_SYMPTOM);
    }

    public function replicate(AuthUser $authUser, Symptom $symptom): bool
    {
        return $authUser->can(\App\Constants\Permission::REPLICATE_SYMPTOM);
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::REORDER_SYMPTOM);
    }

}