<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;

class GemstoneRepository
{
    public function all(): Collection
    {
        if (! Schema::hasTable('products')) {
            return collect();
        }

        return Product::whereNotNull('sku')
            ->whereHas('availablePieces')
            ->withCount('availablePieces')
            ->withSum('availablePieces', 'weight_ct')
            ->orderBy('title')
            ->get();
    }

    public function featured(int $limit = 6): Collection
    {
        if (! Schema::hasTable('products')) {
            return collect();
        }

        return Product::whereNotNull('sku')
            ->where('is_featured', true)
            ->whereHas('availablePieces')
            ->withCount('availablePieces')
            ->withSum('availablePieces', 'weight_ct')
            ->orderBy('title')
            ->limit($limit)
            ->get();
    }

    public function categories(): Collection
    {
        if (! Schema::hasTable('products')) {
            return collect();
        }

        return Product::whereNotNull('sku')
            ->whereHas('availablePieces')
            ->whereNotNull('gem_type')
            ->select('gem_type as category')
            ->distinct()
            ->orderBy('gem_type')
            ->get();
    }
}
