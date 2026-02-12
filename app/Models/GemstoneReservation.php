<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GemstoneReservation extends Model
{
    protected $fillable = [
        'gemstone_piece_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'hold_minutes',
        'expires_at',
        'status',
        'notes',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function piece(): BelongsTo
    {
        return $this->belongsTo(GemstonePiece::class, 'gemstone_piece_id');
    }
}
