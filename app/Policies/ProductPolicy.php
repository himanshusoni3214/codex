<?php

namespace App\Policies;

class ProductPolicy extends AdminCrudPolicy
{
    protected string $resource = 'products';
}
