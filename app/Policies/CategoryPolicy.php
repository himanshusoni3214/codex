<?php

namespace App\Policies;

class CategoryPolicy extends AdminManagePolicy
{
    protected string $resource = 'categories';
}
