<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GemstoneType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'intro',
        'intro_html',
        'history',
        'history_html',
        'buying_guide',
        'buying_guide_html',
        'certification',
        'certification_html',
        'treatment',
        'treatment_html',
        'faq_json',
        'seo_title',
        'seo_description',
        'og_image_id',
        'schema_overrides_json',
        'is_indexable',
        'hero_title',
        'hero_subtitle',
        'history_content',
        'buying_guide_content',
        'certification_content',
        'treatment_content',
        'faq_items',
        'meta_title',
        'meta_description',
        'canonical_url',
        'og_image',
        'schema_json',
    ];

    protected $casts = [
        'faq_items' => 'array',
        'faq_json' => 'array',
        'is_indexable' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_gemstone_type',
            'gemstone_type_id',
            'product_id'
        )->withTimestamps();
    }

    public function origins(): HasMany
    {
        return $this->hasMany(Origin::class);
    }

    public function getResolvedIntroAttribute(): ?string
    {
        return $this->intro_html ?: $this->intro ?: $this->description;
    }

    public function getResolvedHistoryAttribute(): ?string
    {
        return $this->history_html ?: $this->history ?: $this->history_content;
    }

    public function getResolvedBuyingGuideAttribute(): ?string
    {
        return $this->buying_guide_html ?: $this->buying_guide ?: $this->buying_guide_content;
    }

    public function getResolvedCertificationAttribute(): ?string
    {
        return $this->certification_html ?: $this->certification ?: $this->certification_content;
    }

    public function getResolvedTreatmentAttribute(): ?string
    {
        return $this->treatment_html ?: $this->treatment ?: $this->treatment_content;
    }

    public function getResolvedFaqItemsAttribute(): array
    {
        return $this->faq_json ?: ($this->faq_items ?: []);
    }

    public function getResolvedSeoTitleAttribute(): ?string
    {
        return $this->seo_title ?: $this->meta_title;
    }

    public function getResolvedSeoDescriptionAttribute(): ?string
    {
        return $this->seo_description ?: $this->meta_description;
    }

    public function getResolvedSchemaJsonAttribute(): ?string
    {
        return $this->schema_overrides_json ?: $this->schema_json;
    }

    public function getResolvedOgImageAttribute(): ?string
    {
        if ($this->og_image) {
            return $this->og_image;
        }

        if (! $this->og_image_id) {
            return null;
        }

        return Media::query()->find($this->og_image_id)?->getUrl();
    }
}
