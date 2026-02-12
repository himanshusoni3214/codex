<?php

namespace App\Policies;

class MediaPolicy extends AdminManagePolicy
{
    protected string $resource = 'media';
}
