<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultationTier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'price_cad',
        'duration_minutes',
        'description',
        'is_active',
    ];

    protected $casts = [
        'price_cad' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }
}
