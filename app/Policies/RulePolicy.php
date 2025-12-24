<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Rule;
use Illuminate\Auth\Access\HandlesAuthorization;

class RulePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_ANY_RULE);
    }

    public function view(AuthUser $authUser, Rule $rule): bool
    {
        return $authUser->can(\App\Constants\Permission::VIEW_RULE);
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::CREATE_RULE);
    }

    public function update(AuthUser $authUser, Rule $rule): bool
    {
        return $authUser->can(\App\Constants\Permission::UPDATE_RULE);
    }

    public function delete(AuthUser $authUser, Rule $rule): bool
    {
        return $authUser->can(\App\Constants\Permission::DELETE_RULE);
    }

    public function restore(AuthUser $authUser, Rule $rule): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_RULE);
    }

    public function forceDelete(AuthUser $authUser, Rule $rule): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_RULE);
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::FORCE_DELETE_ANY_RULE);
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::RESTORE_ANY_RULE);
    }

    public function replicate(AuthUser $authUser, Rule $rule): bool
    {
        return $authUser->can(\App\Constants\Permission::REPLICATE_RULE);
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can(\App\Constants\Permission::REORDER_RULE);
    }

}