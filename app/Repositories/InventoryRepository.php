<?php

namespace App\Repositories;

use App\Models\InventoryItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;

class InventoryRepository
{
    public function all(): Collection
    {
        if (! Schema::hasTable('products')) {
            return collect();
        }

        return InventoryItem::orderBy('title')->get();
    }

    public function categories(): Collection
    {
        if (! Schema::hasTable('products')) {
            return collect();
        }

        return InventoryItem::whereNotNull('gem_type')
            ->select('gem_type as category')
            ->distinct()
            ->orderBy('gem_type')
            ->get();
    }
}
