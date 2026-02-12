<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class AdminCrudPolicy
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

    protected function can(User $user, string $ability): bool
    {
        return $user->can("{$this->resource}.{$ability}");
    }

    public function viewAny(User $user): bool
    {
        return $this->can($user, 'view');
    }

    public function view(User $user): bool
    {
        return $this->can($user, 'view');
    }

    public function create(User $user): bool
    {
        return $this->can($user, 'create');
    }

    public function update(User $user): bool
    {
        return $this->can($user, 'update');
    }

    public function delete(User $user): bool
    {
        return $this->can($user, 'delete');
    }
}
