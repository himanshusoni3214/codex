<?php

namespace App\SEO\Schema;

use App\Models\Product;
use App\Services\SeoUrlService;
use Illuminate\Support\Str;

final class ProductSchema
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    /**
     * @param  array{
     *   typeSlug?: string|null,
     *   category?: string|null,
     *   description?: string|null,
     *   url?: string|null,
     *   image?: string|null,
     * }  $context
     */
    public function build(Product $product, array $context = []): array
    {
        $typeSlug = $context['typeSlug']
            ?? $product->primary_type_slug
            ?? null;

        $urlOverride = $context['url'] ?? null;
        $url = $urlOverride
            ? $this->seoUrlService->forceSiteHost($urlOverride)
            : $this->seoUrlService->absolute($product->detailPath($typeSlug));

        $imageOverride = $context['image'] ?? null;
        $image = $imageOverride ?: $this->resolveVisibleImageUrl($product);

        $category = $context['category']
            ?? $product->gem_type
            ?? optional($product->primary_gemstone_type)->name
            ?? 'Gemstone';

        $availablePieces = $product->available_quantity ?? 0;
        $priceCad = $product->price_cad !== null ? (float) $product->price_cad : null;

        $description = $context['description']
            ?? $product->short_description
            ?? $product->description
            ?? $product->title;
        $description = $this->normalizeDescription($description);

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => (string) $product->title,
            'image' => $image ? [$image] : null,
            'description' => $description,
            'sku' => (string) ($product->sku ?? ''),
            'category' => (string) $category,
            'brand' => [
                '@type' => 'Brand',
                'name' => 'Natural Gem Store',
            ],
            'offers' => array_filter([
                '@type' => 'Offer',
                'priceCurrency' => 'CAD',
                // Only include price when it is visibly displayed as a numeric CAD total.
                'price' => $priceCad !== null ? number_format($priceCad, 2, '.', '') : null,
                'availability' => $availablePieces > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                'url' => $url,
                'itemCondition' => 'https://schema.org/NewCondition',
            ]),
        ];

        $additional = [];
        if ($product->certificate_lab) {
            $additional[] = [
                '@type' => 'PropertyValue',
                'name' => 'Certification Lab',
                'value' => $product->certificate_lab,
            ];
        }
        if ($product->certificate_number) {
            $additional[] = [
                '@type' => 'PropertyValue',
                'name' => 'Certificate Number',
                'value' => $product->certificate_number,
            ];
        }
        if ($product->treatment) {
            $additional[] = [
                '@type' => 'PropertyValue',
                'name' => 'Treatment Disclosure',
                'value' => $product->treatment,
            ];
        }

        if ($additional !== []) {
            $schema['additionalProperty'] = $additional;
        }

        return array_filter($schema, fn ($value) => $value !== null && $value !== '');
    }

    private function resolveVisibleImageUrl(Product $product): ?string
    {
        if (method_exists($product, 'hasMedia') && $product->hasMedia('images')) {
            $media = $product->getFirstMedia('images');
            if ($media) {
                return $this->seoUrlService->resolveImageReference($media->getUrl());
            }
        }

        if ($product->image) {
            return $this->seoUrlService->resolveImageReference($product->image);
        }

        return $this->seoUrlService->absolute('/images/gemstones/emerald.svg');
    }

    private function normalizeDescription(string $value): string
    {
        $plain = trim(strip_tags($value));
        $plain = (string) Str::of($plain)->squish();

        // Keep schema "description" readable, aligned to visible content, and not excessively long.
        // (~150-300 words max requested; we cap at 300 words.)
        return Str::words($plain, 300, '');
    }
}
