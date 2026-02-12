<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GemstoneLot extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'product_id',
        'lot_code',
        'origin',
        'treatment',
        'disclosure',
        'certificate_type',
        'certificate_number',
        'certificate_url',
        'notes',
        'received_at',
    ];

    protected $casts = [
        'received_at' => 'date',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function pieces(): HasMany
    {
        return $this->hasMany(GemstonePiece::class, 'lot_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('certificates');
    }
}
