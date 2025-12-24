<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Disease;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiseasePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_ANY_DISEASE);
    }

    public function view(AuthUser $authUser, Disease $disease): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_DISEASE);
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::CREATE_DISEASE);
    }

    public function update(AuthUser $authUser, Disease $disease): bool
    {
        return $authUser->can(\App\Constants\Permission::UPDATE_DISEASE);
    }

    public function delete(AuthUser $authUser, Disease $disease): bool
    {
        return $authUser->can(\App\Constants\Permission::DELETE_DISEASE);
    }

    public function restore(AuthUser $authUser, Disease $disease): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_DISEASE);
    }

    public function forceDelete(AuthUser $authUser, Disease $disease): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_DISEASE);
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_ANY_DISEASE);
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_ANY_DISEASE);
    }

    public function replicate(AuthUser $authUser, Disease $disease): bool
    {
        return $authUser->can(\App\Constants\Permission::REPLICATE_DISEASE);
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::REORDER_DISEASE);
    }

}