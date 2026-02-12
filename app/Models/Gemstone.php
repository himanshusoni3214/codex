<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Gemstone extends Product
{
    protected $table = 'products';

    protected $attributes = [
        'product_type' => 'gemstone',
        'status' => 'active',
        'currency' => 'CAD',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('gemstone', function (Builder $builder) {
            $builder->where('product_type', 'gemstone')
                ->whereNull('sku');
        });
    }
}
