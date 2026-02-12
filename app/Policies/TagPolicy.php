<?php

namespace App\Policies;

class TagPolicy extends AdminManagePolicy
{
    protected string $resource = 'tags';
}
