<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_date',
        'birth_time',
        'birth_place',
        'consultation_tier',
        'focus_area',
        'notes',
        'consent',
        'consultation_tier_id',
        'customer_id',
        'assigned_to_user_id',
        'status',
        'appointment_at',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'consent' => 'boolean',
        'appointment_at' => 'datetime',
    ];

    public function tier(): BelongsTo
    {
        return $this->belongsTo(ConsultationTier::class, 'consultation_tier_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }
}
