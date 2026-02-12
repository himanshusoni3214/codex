<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class AdminManagePolicy
{
    use HandlesAuthorization;

    protected string $resource = '';

    public function before(User $user): ?bool
    {
        if ($user->is_admin || $user->hasRole('Super Admin')) {
            return true;
        }

        return null;
    }

    protected function canManage(User $user): bool
    {
        return $user->can("{$this->resource}.manage");
    }

    public function viewAny(User $user): bool
    {
        return $this->canManage($user);
    }

    public function view(User $user): bool
    {
        return $this->canManage($user);
    }

    public function create(User $user): bool
    {
        return $this->canManage($user);
    }

    public function update(User $user): bool
    {
        return $this->canManage($user);
    }

    public function delete(User $user): bool
    {
        return $this->canManage($user);
    }
}
