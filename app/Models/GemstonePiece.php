<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GemstonePiece extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'product_id',
        'lot_id',
        'piece_code',
        'weight_ct',
        'price_total_cad',
        'rate_per_carat_cad',
        'status',
        'reserved_until',
        'reserved_by',
        'sold_at',
        'metadata',
    ];

    protected $casts = [
        'weight_ct' => 'decimal:2',
        'price_total_cad' => 'decimal:2',
        'rate_per_carat_cad' => 'decimal:2',
        'reserved_until' => 'datetime',
        'sold_at' => 'datetime',
        'metadata' => 'array',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function lot(): BelongsTo
    {
        return $this->belongsTo(GemstoneLot::class, 'lot_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(GemstoneReservation::class);
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query
            ->where('status', 'available')
            ->where(function (Builder $sub) {
                $sub->whereNull('reserved_until')
                    ->orWhere('reserved_until', '<', now());
            });
    }

    public function getComputedPriceAttribute(): ?float
    {
        if ($this->price_total_cad !== null) {
            return (float) $this->price_total_cad;
        }

        $rate = $this->rate_per_carat_cad ?? $this->product?->rate_per_carat;
        if ($rate === null || $this->weight_ct === null) {
            return null;
        }

        return round((float) $rate * (float) $this->weight_ct, 2);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('certificates');
        $this->addMediaCollection('photos');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('webp')
            ->format('webp')
            ->quality(85)
            ->optimize()
            ->performOnCollections('photos');
    }

    public function setMetadataAttribute($value): void
    {
        if (is_string($value) && $value !== '') {
            $decoded = json_decode($value, true);
            $this->attributes['metadata'] = json_last_error() === JSON_ERROR_NONE ? $decoded : ['notes' => $value];
            return;
        }

        $this->attributes['metadata'] = $value ?: null;
    }
}
