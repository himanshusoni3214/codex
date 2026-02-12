<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminAuditPolicy
{
    use HandlesAuthorization;

    public function before(User $user): ?bool
    {
        if ($user->is_admin || $user->hasRole('Super Admin')) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->can('audits.view');
    }

    public function view(User $user): bool
    {
        return $user->can('audits.view');
    }
}
