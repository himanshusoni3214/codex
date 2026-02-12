<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_id',
        'product_id',
        'customer_id',
        'order_number',
        'message',
        'preferred_date',
        'preferred_time',
        'location',
        'status',
        'subtotal',
        'tax',
        'total',
        'tax_rate',
        'currency',
        'province',
        'paid_at',
        'refunded_at',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'paid_at' => 'datetime',
        'refunded_at' => 'datetime',
    ];

    public function gemstone(): BelongsTo
    {
        return $this->belongsTo(Gemstone::class, 'service_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
