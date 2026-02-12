<?php

namespace App\Policies;

class PagePolicy extends AdminManagePolicy
{
    protected string $resource = 'pages';
}
