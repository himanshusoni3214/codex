<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'product_type',
        'status',
        'short_description',
        'description',
        'image',
        'sku',
        'price_cad',
        'currency',
        'rate_per_carat',
        'total_weight',
        'total_quantity',
        'weight_per_piece',
        'serial_quantity',
        'notes',
        'low_stock_threshold',
        'weight',
        'gem_type',
        'treatment',
        'treatment_disclosure',
        'treatment_text',
        'certificate_lab',
        'certificate_number',
        'certificate_url',
        'certification_text',
        'origin',
        'origin_text',
        'carat',
        'color',
        'clarity',
        'cut',
        'shape',
        'symbolic_meaning',
        'category_id',
        'is_featured',
        'meta_title',
        'meta_description',
        'og_image',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price_cad' => 'decimal:2',
        'rate_per_carat' => 'decimal:2',
        'carat' => 'decimal:2',
        'weight' => 'decimal:2',
        'total_weight' => 'decimal:2',
        'weight_per_piece' => 'decimal:2',
        'total_quantity' => 'integer',
        'low_stock_threshold' => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getDisplayPriceAttribute(): string
    {
        return $this->price_cad ? 'CAD $' . number_format((float) $this->price_cad, 2) : 'Price on request';
    }

    public function getCategoryAttribute(): ?string
    {
        return $this->gem_type;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function gemstoneLots()
    {
        return $this->hasMany(GemstoneLot::class);
    }

    public function gemstonePieces()
    {
        return $this->hasMany(GemstonePiece::class);
    }

    public function availablePieces()
    {
        return $this->gemstonePieces()->available();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function gemstoneTypes(): BelongsToMany
    {
        return $this->belongsToMany(
            GemstoneType::class,
            'product_gemstone_type',
            'product_id',
            'gemstone_type_id'
        );
    }

    public function origins(): BelongsToMany
    {
        return $this->belongsToMany(Origin::class);
    }

    public function certifications(): BelongsToMany
    {
        return $this->belongsToMany(Certification::class)
            ->withPivot(['certificate_number', 'certificate_url', 'issued_at', 'is_primary'])
            ->withTimestamps();
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('images')
            ->useFallbackUrl($this->image ?? '');

        $this
            ->addMediaCollection('certificates')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('webp')
            ->format('webp')
            ->quality(85)
            ->optimize()
            ->performOnCollections('images');
    }

    public function getAvailableQuantityAttribute(): int
    {
        if (array_key_exists('available_pieces_count', $this->attributes)) {
            return (int) $this->attributes['available_pieces_count'];
        }

        return $this->availablePieces()->count();
    }

    public function getAvailableWeightTotalAttribute(): float
    {
        if (array_key_exists('available_pieces_sum_weight_ct', $this->attributes)) {
            return (float) $this->attributes['available_pieces_sum_weight_ct'];
        }

        return (float) $this->availablePieces()->sum('weight_ct');
    }

    public function getDisplayRatePerCaratAttribute(): ?float
    {
        if ($this->rate_per_carat !== null) {
            return (float) $this->rate_per_carat;
        }

        $pieceRate = $this->gemstonePieces()
            ->whereNotNull('rate_per_carat_cad')
            ->value('rate_per_carat_cad');

        if ($pieceRate !== null) {
            return (float) $pieceRate;
        }

        $piece = $this->gemstonePieces()
            ->whereNotNull('price_total_cad')
            ->whereNotNull('weight_ct')
            ->first();

        if ($piece && $piece->weight_ct) {
            return round(((float) $piece->price_total_cad) / (float) $piece->weight_ct, 2);
        }

        return null;
    }

    public function getPrimaryGemstoneTypeAttribute(): ?GemstoneType
    {
        return $this->relationLoaded('gemstoneTypes')
            ? $this->gemstoneTypes->first()
            : $this->gemstoneTypes()->first();
    }

    public function getPrimaryOriginAttribute(): ?Origin
    {
        return $this->relationLoaded('origins')
            ? $this->origins->first()
            : $this->origins()->first();
    }

    public function getPrimaryTypeSlugAttribute(): ?string
    {
        $type = $this->primary_gemstone_type;
        if ($type?->slug) {
            return $type->slug;
        }

        if ($this->gem_type) {
            return Str::slug($this->gem_type);
        }

        return null;
    }

    public function getSeoSlugAttribute(): string
    {
        $baseSlug = trim((string) $this->slug);
        if ($baseSlug === '') {
            $baseSlug = Str::slug($this->title ?: 'gemstone');
        }

        $skuSlug = Str::slug((string) $this->sku);
        if ($skuSlug === '') {
            return $baseSlug;
        }

        $lowerBase = Str::lower($baseSlug);
        $hasSkuSuffix = Str::endsWith($lowerBase, '-' . $skuSlug) || $lowerBase === $skuSlug;

        return $hasSkuSuffix ? $baseSlug : "{$baseSlug}-{$skuSlug}";
    }

    public function detailPath(?string $typeSlug = null): string
    {
        $resolvedTypeSlug = $typeSlug ?: $this->primary_type_slug;
        $productSlug = $this->seo_slug;

        if ($resolvedTypeSlug) {
            return "/gemstones/{$resolvedTypeSlug}/{$productSlug}";
        }

        return "/gemstones/{$productSlug}";
    }

    public function getSeoImageAltAttribute(): string
    {
        $parts = [];

        if ($this->certificate_lab) {
            $parts[] = 'Certified';
        }

        if ($this->origin) {
            $parts[] = $this->origin;
        }

        if ($this->gem_type) {
            $parts[] = $this->gem_type;
        }

        if ($this->carat) {
            $parts[] = number_format((float) $this->carat, 2) . ' CT';
        } elseif ($this->weight_per_piece) {
            $parts[] = number_format((float) $this->weight_per_piece, 2) . ' CT';
        }

        if ($parts === []) {
            return trim(($this->title ?: 'Natural Gem') . ' gemstone');
        }

        return implode(' ', $parts);
    }
}
