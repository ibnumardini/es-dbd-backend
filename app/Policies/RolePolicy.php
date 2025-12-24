<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_ANY_ROLE);
    }

    public function view(AuthUser $authUser, Role $role): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_ROLE);
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::CREATE_ROLE);
    }

    public function update(AuthUser $authUser, Role $role): bool
    {
        return $authUser->can(\App\Constants\Permission::UPDATE_ROLE);
    }

    public function delete(AuthUser $authUser, Role $role): bool
    {
        return $authUser->can(\App\Constants\Permission::DELETE_ROLE);
    }

    public function restore(AuthUser $authUser, Role $role): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_ROLE);
    }

    public function forceDelete(AuthUser $authUser, Role $role): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_ROLE);
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_ANY_ROLE);
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_ANY_ROLE);
    }

    public function replicate(AuthUser $authUser, Role $role): bool
    {
        return $authUser->can(\App\Constants\Permission::REPLICATE_ROLE);
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::REORDER_ROLE);
    }

}