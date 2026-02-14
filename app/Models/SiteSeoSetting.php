<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSeoSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'site_url',
        'logo_url',
        'same_as',
        'contact_phone',
        'contact_email',
        'address_line',
        'city',
        'province',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'opening_hours',
        'default_meta_title',
        'default_meta_description',
        'default_og_image',
    ];

    protected $casts = [
        'same_as' => 'array',
        'opening_hours' => 'array',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];
}
