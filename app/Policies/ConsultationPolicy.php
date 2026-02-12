<?php

namespace App\Policies;

class ConsultationPolicy extends AdminManagePolicy
{
    protected string $resource = 'consultations';
}
