<?php

namespace App\Policies;

class CustomerPolicy extends AdminManagePolicy
{
    protected string $resource = 'customers';
}
