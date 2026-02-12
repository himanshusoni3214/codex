<?php

namespace App\Policies;

class UserPolicy extends AdminManagePolicy
{
    protected string $resource = 'users';
}
