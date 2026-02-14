<?php

namespace App\Repositories;

use App\Models\GemstoneType;
use App\Models\Origin;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class GemstoneRepository
{
    public function all(): Collection
    {
        return $this->buildAvailableQuery()
            ->get();
    }

    public function paginateAvailable(?int $perPage = null): LengthAwarePaginator
    {
        $perPage = $perPage ?: config('seo.pagination.gemstones_per_page', 12);

        return $this->buildAvailableQuery()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function featured(int $limit = 6): Collection
    {
        if (! Schema::hasTable('products')) {
            return collect();
        }

        return Product::query()
            ->whereNotNull('sku')
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

        return Product::query()
            ->whereNotNull('sku')
            ->where('status', 'active')
            ->whereHas('availablePieces')
            ->whereNotNull('gem_type')
            ->select('gem_type as category')
            ->distinct()
            ->orderBy('gem_type')
            ->get();
    }

    public function byType(string $typeSlug): Collection
    {
        return $this->buildTypeFilteredQuery($typeSlug)
            ->with(['gemstoneTypes', 'origins'])
            ->get();
    }

    public function byTypePaginated(string $typeSlug, ?int $perPage = null): LengthAwarePaginator
    {
        $perPage = $perPage ?: config('seo.pagination.gemstones_per_page', 12);

        return $this->buildTypeFilteredQuery($typeSlug)
            ->with(['gemstoneTypes', 'origins'])
            ->paginate($perPage)
            ->withQueryString();
    }

    public function byTypeAndOrigin(string $typeSlug, string $originSlug): Collection
    {
        return $this->buildTypeAndOriginFilteredQuery($typeSlug, $originSlug)
            ->with(['gemstoneTypes', 'origins'])
            ->get();
    }

    public function byTypeAndOriginPaginated(string $typeSlug, string $originSlug, ?int $perPage = null): LengthAwarePaginator
    {
        $perPage = $perPage ?: config('seo.pagination.gemstones_per_page', 12);

        return $this->buildTypeAndOriginFilteredQuery($typeSlug, $originSlug)
            ->with(['gemstoneTypes', 'origins'])
            ->paginate($perPage)
            ->withQueryString();
    }

    public function availableTypes(): Collection
    {
        if (! Schema::hasTable('products')) {
            return collect();
        }

        if ($this->hasTypeTaxonomy()) {
            return GemstoneType::query()
                ->whereHas('products', fn (Builder $q) => $q->whereHas('availablePieces')->whereNotNull('sku')->where('status', 'active'))
                ->orderBy('name')
                ->get();
        }

        return Product::query()
            ->whereNotNull('sku')
            ->where('status', 'active')
            ->whereHas('availablePieces')
            ->whereNotNull('gem_type')
            ->select('gem_type')
            ->distinct()
            ->orderBy('gem_type')
            ->get()
            ->map(function ($row) {
                $name = trim((string) $row->gem_type);
                return (object) [
                    'name' => $name,
                    'slug' => Str::slug($name),
                ];
            });
    }

    public function availableOrigins(?string $typeSlug = null): Collection
    {
        if (! Schema::hasTable('products')) {
            return collect();
        }

        if ($this->hasOriginTaxonomy()) {
            $query = Origin::query()
                ->whereHas('products', function (Builder $q) use ($typeSlug) {
                    $q->whereHas('availablePieces')->whereNotNull('sku')->where('status', 'active');
                    if ($typeSlug && $this->hasTypeTaxonomy()) {
                        $q->whereHas('gemstoneTypes', fn (Builder $sub) => $sub->where('slug', $typeSlug));
                    }
                })
                ->with('gemstoneType:id,slug')
                ->with(['products' => function ($q) {
                    $q->whereNotNull('sku')->where('status', 'active')->whereHas('availablePieces')->with('gemstoneTypes');
                }])
                ->orderBy('name');

            return $query->get()->map(function (Origin $origin) {
                $typeSlug = $origin->gemstoneType?->slug ?: optional(
                    $origin->products
                        ->flatMap(fn ($product) => $product->gemstoneTypes)
                        ->first()
                )->slug;

                $origin->setAttribute('primary_type_slug', $typeSlug);
                return $origin;
            });
        }

        $query = Product::query()
            ->whereNotNull('sku')
            ->where('status', 'active')
            ->whereHas('availablePieces')
            ->whereNotNull('origin');

        if ($typeSlug) {
            $query->whereRaw("lower(replace(gem_type, ' ', '-')) = ?", [Str::lower($typeSlug)]);
        }

        return $query
            ->select('origin')
            ->distinct()
            ->orderBy('origin')
            ->get()
            ->map(function ($row) {
                $name = trim((string) $row->origin);
                return (object) [
                    'name' => $name,
                    'slug' => Str::slug($name),
                ];
            });
    }

    public function availableOriginsGroupedByType(): Collection
    {
        $groups = collect();

        foreach ($this->availableTypes() as $type) {
            $origins = $this->availableOrigins($type->slug);
            if ($origins->isEmpty()) {
                continue;
            }

            $groups->push((object) [
                'type' => $type,
                'origins' => $origins,
            ]);
        }

        return $groups;
    }

    private function buildAvailableQuery(): Builder
    {
        if (! Schema::hasTable('products')) {
            return Product::query()->whereRaw('1 = 0');
        }

        return $this->baseAvailableQuery()
            ->withCount('availablePieces')
            ->withSum('availablePieces', 'weight_ct')
            ->orderBy('title');
    }

    private function buildTypeFilteredQuery(string $typeSlug): Builder
    {
        $query = $this->buildAvailableQuery();

        if ($this->hasTypeTaxonomy()) {
            $query->whereHas('gemstoneTypes', fn (Builder $q) => $q->where('slug', $typeSlug));
        } else {
            $query->whereRaw("lower(replace(gem_type, ' ', '-')) = ?", [Str::lower($typeSlug)]);
        }

        return $query;
    }

    private function buildTypeAndOriginFilteredQuery(string $typeSlug, string $originSlug): Builder
    {
        $query = $this->buildTypeFilteredQuery($typeSlug);

        if ($this->hasOriginTaxonomy()) {
            $query->whereHas('origins', fn (Builder $q) => $q->where('slug', $originSlug));
        } else {
            $query->whereRaw("lower(replace(origin, ' ', '-')) = ?", [Str::lower($originSlug)]);
        }

        return $query;
    }

    private function baseAvailableQuery(): Builder
    {
        return Product::query()
            ->whereNotNull('sku')
            ->where('status', 'active')
            ->whereHas('availablePieces');
    }

    private function hasTypeTaxonomy(): bool
    {
        return Schema::hasTable('gemstone_types') && Schema::hasTable('product_gemstone_type');
    }

    private function hasOriginTaxonomy(): bool
    {
        return Schema::hasTable('origins') && Schema::hasTable('origin_product');
    }
}
