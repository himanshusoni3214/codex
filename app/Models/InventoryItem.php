<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class InventoryItem extends Product
{
    protected $table = 'products';

    protected static function booted(): void
    {
        static::addGlobalScope('inventory', function (Builder $builder) {
            $builder->whereNotNull('sku');
        });
    }
}
