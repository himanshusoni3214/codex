<?php

namespace App\Policies;

class GemstoneReservationPolicy extends AdminCrudPolicy
{
    protected string $resource = 'gemstone_reservations';
}
