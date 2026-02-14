<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'section',
        'title',
        'hero_title',
        'hero_subtitle',
        'meta_title',
        'meta_description',
        'canonical_url',
        'schema_json',
        'faq_items',
        'related_links',
        'content',
        'excerpt',
        'template',
        'status',
        'is_indexable',
        'og_image',
    ];

    protected $casts = [
        'faq_items' => 'array',
        'related_links' => 'array',
        'is_indexable' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
