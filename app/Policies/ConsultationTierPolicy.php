<?php

namespace App\Policies;

class ConsultationTierPolicy extends AdminManagePolicy
{
    protected string $resource = 'consultations';
}
