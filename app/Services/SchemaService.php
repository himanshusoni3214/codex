<?php

namespace App\Services;

use App\Models\SiteSeoSetting;
use Illuminate\Support\Facades\Schema;

class SchemaService
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function build(array $context = []): array
    {
        $settings = $context['settings'] ?? [];
        $page = $context['page'] ?? null;
        $gemstone = $context['gemstone'] ?? null;
        $type = $context['type'] ?? null;
        $origin = $context['origin'] ?? null;
        $faqItems = $context['faqItems']
            ?? ($page?->faq_items ?? $page?->faq_json ?? [])
            ?? ($origin?->faq_json ?? $origin?->faq_items ?? [])
            ?? ($type?->faq_json ?? $type?->faq_items ?? []);
        $breadcrumbs = $context['breadcrumbs'] ?? [];
        $siteSeo = Schema::hasTable('site_seo_settings')
            ? SiteSeoSetting::query()->first()
            : null;
        $routeName = request()->route()?->getName();
        $includeLocalBusiness = (bool) ($context['include_local_business']
            ?? (is_string($routeName) && str_starts_with($routeName, 'local.')));

        $orgConfig = config('seo.organization', []);
        $organizationName = $siteSeo?->organization_name
            ?: ($settings['site_name'] ?? ($orgConfig['name'] ?? config('seo.site_name', 'Natural Gem')));
        $siteUrl = $this->seoUrlService->siteUrl();
        $logoUrl = $this->seoUrlService->resolveImageReference(
            $siteSeo?->logo_url ?: ($settings['logo_path'] ?? config('seo.default_og_image'))
        );
        $phone = $siteSeo?->contact_phone ?: ($settings['contact_phone'] ?? ($orgConfig['phone'] ?? null));
        $email = $siteSeo?->contact_email ?: ($settings['contact_email'] ?? ($orgConfig['email'] ?? null));

        $schemas = [];

        $schemas[] = array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $organizationName,
            'url' => $siteUrl,
            'logo' => $logoUrl,
            'sameAs' => $this->normalizeSameAs($siteSeo?->same_as ?: ($orgConfig['social_links'] ?? [])),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => $phone,
                'email' => $email,
                'contactType' => 'customer support',
                'areaServed' => 'CA',
            ],
        ]);

        if ($includeLocalBusiness) {
            $schemas[] = array_filter([
                '@context' => 'https://schema.org',
                '@type' => 'LocalBusiness',
                'name' => $organizationName,
                'url' => $siteUrl,
                'image' => $logoUrl,
                'telephone' => $phone,
                'email' => $email,
                'areaServed' => 'CA',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => $siteSeo?->address_line ?: ($orgConfig['address_line'] ?? null),
                    'addressLocality' => $siteSeo?->city ?: ($orgConfig['city'] ?? 'Toronto'),
                    'addressRegion' => $siteSeo?->province ?: ($orgConfig['province'] ?? 'Ontario'),
                    'postalCode' => $siteSeo?->postal_code ?: ($orgConfig['postal_code'] ?? null),
                    'addressCountry' => $siteSeo?->country ?: ($orgConfig['country'] ?? 'CA'),
                ],
                'geo' => ($siteSeo?->latitude && $siteSeo?->longitude) ? [
                    '@type' => 'GeoCoordinates',
                    'latitude' => (float) $siteSeo->latitude,
                    'longitude' => (float) $siteSeo->longitude,
                ] : null,
                'openingHoursSpecification' => $siteSeo?->opening_hours ?: null,
            ]);
        }

        if ($gemstone) {
            $typeSlug = $type?->slug
                ?: optional($gemstone->primary_gemstone_type)->slug
                ?: null;
            $productUrl = $this->seoUrlService->absolute($gemstone->detailPath($typeSlug));
            $productImage = $gemstone->image
                ? [$this->seoUrlService->resolveImageReference($gemstone->image)]
                : null;

            $productPrice = $gemstone->price_cad;
            if ($productPrice === null && $gemstone->display_rate_per_carat && $gemstone->weight_per_piece) {
                $productPrice = round((float) $gemstone->display_rate_per_carat * (float) $gemstone->weight_per_piece, 2);
            }

            $additionalProperties = [];
            if ($gemstone->certificate_lab) {
                $additionalProperties[] = [
                    '@type' => 'PropertyValue',
                    'name' => 'Certification Lab',
                    'value' => $gemstone->certificate_lab,
                ];
            }
            if ($gemstone->certificate_number) {
                $additionalProperties[] = [
                    '@type' => 'PropertyValue',
                    'name' => 'Certificate Number',
                    'value' => $gemstone->certificate_number,
                ];
            }
            if ($gemstone->treatment) {
                $additionalProperties[] = [
                    '@type' => 'PropertyValue',
                    'name' => 'Treatment Disclosure',
                    'value' => $gemstone->treatment,
                ];
            }

            $schemas[] = array_filter([
                '@context' => 'https://schema.org',
                '@type' => 'Product',
                'name' => $gemstone->title,
                'image' => $productImage,
                'description' => $gemstone->short_description ?: strip_tags((string) $gemstone->description),
                'sku' => $gemstone->sku,
                'brand' => [
                    '@type' => 'Brand',
                    'name' => $organizationName,
                ],
                'additionalProperty' => $additionalProperties !== [] ? $additionalProperties : null,
                'offers' => [
                    '@type' => 'Offer',
                    'priceCurrency' => 'CAD',
                    'price' => $productPrice,
                    'availability' => $gemstone->available_quantity > 0
                        ? 'https://schema.org/InStock'
                        : 'https://schema.org/OutOfStock',
                    'url' => $productUrl,
                ],
            ]);
        }

        if (!empty($faqItems)) {
            $mainEntity = collect($faqItems)
                ->filter(fn ($item) => ! empty($item['question']) && ! empty($item['answer']))
                ->map(function ($item) {
                    return [
                    '@type' => 'Question',
                    'name' => $item['question'] ?? '',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $item['answer'] ?? '',
                    ],
                    ];
                })
                ->values()
                ->toArray();

            if ($mainEntity !== []) {
                $schemas[] = [
                    '@context' => 'https://schema.org',
                    '@type' => 'FAQPage',
                    'mainEntity' => $mainEntity,
                ];
            }
        }

        if (!empty($breadcrumbs)) {
            $itemList = [];
            foreach ($breadcrumbs as $index => $crumb) {
                $itemList[] = [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $crumb['label'] ?? '',
                    'item' => $this->seoUrlService->forceSiteHost($crumb['url'] ?? $this->seoUrlService->current(request())),
                ];
            }

            $schemas[] = [
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => $itemList,
            ];
        }

        foreach ([$page?->schema_json ?? null, $type?->schema_overrides_json ?? $type?->schema_json ?? null, $origin?->schema_overrides_json ?? $origin?->schema_json ?? null] as $jsonSchema) {
            $decoded = $this->decodeSchemaJson($jsonSchema);
            if ($decoded !== null) {
                $schemas[] = $decoded;
            }
        }

        return array_values(array_filter($schemas));
    }

    private function decodeSchemaJson(?string $json): ?array
    {
        if (! $json) {
            return null;
        }

        $decoded = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE || ! is_array($decoded)) {
            return null;
        }

        return $decoded;
    }

    private function normalizeSameAs(mixed $sameAs): ?array
    {
        if ($sameAs === null) {
            return null;
        }

        $values = collect($sameAs)
            ->map(fn ($item) => is_array($item) ? ($item['url'] ?? null) : $item)
            ->filter()
            ->values()
            ->toArray();

        return $values !== [] ? $values : null;
    }
}
