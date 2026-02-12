<?php

namespace App\Policies;

class CertificationPolicy extends AdminManagePolicy
{
    protected string $resource = 'certifications';
}
