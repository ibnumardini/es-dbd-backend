<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_ANY_USER);
    }

    public function view(AuthUser $authUser, User $user): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_USER);
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::CREATE_USER);
    }

    public function update(AuthUser $authUser, User $user): bool
    {
        return $authUser->can(\App\Constants\Permission::UPDATE_USER);
    }

    public function delete(AuthUser $authUser, User $user): bool
    {
        return $authUser->can(\App\Constants\Permission::DELETE_USER);
    }

    public function restore(AuthUser $authUser, User $user): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_USER);
    }

    public function forceDelete(AuthUser $authUser, User $user): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_USER);
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_ANY_USER);
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_ANY_USER);
    }

    public function replicate(AuthUser $authUser, User $user): bool
    {
        return $authUser->can(\App\Constants\Permission::REPLICATE_USER);
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::REORDER_USER);
    }

}