<?php

namespace App\Policies;

class OrderPolicy extends AdminManagePolicy
{
    protected string $resource = 'orders';
}
