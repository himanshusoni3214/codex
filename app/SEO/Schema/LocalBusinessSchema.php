<?php

namespace App\SEO\Schema;

use App\Services\SeoUrlService;

final class LocalBusinessSchema
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function build(array $settings = [], ?string $serviceArea = null): array
    {
        $orgConfig = config('seo.organization', []);

        $siteName = (string) ($settings['site_name'] ?? config('seo.site_name', 'Natural Gem Store'));
        $phone = (string) ($settings['contact_phone'] ?? ($orgConfig['phone'] ?? '+1 (647) 555-0199'));
        $email = (string) ($settings['contact_email'] ?? ($orgConfig['email'] ?? 'hello@naturalgem.com'));
        $contactAddress = (string) ($settings['contact_address'] ?? ($orgConfig['address_line'] ?? 'Toronto, Ontario, Canada'));

        $logoRef = $settings['logo_path']
            ?? config('seo.default_og_image')
            ?? '/images/natural-gem-logo.svg';
        $logoUrl = $this->seoUrlService->resolveImageReference($logoRef)
            ?: $this->seoUrlService->absolute('/images/natural-gem-logo.svg');

        // Use a specific LocalBusiness subtype where it fits the visible business model.
        // We avoid adding fields that aren't visible sitewide (e.g. opening hours).
        return [
            '@context' => 'https://schema.org',
            '@type' => 'JewelryStore',
            'name' => $siteName,
            'url' => $this->seoUrlService->siteUrl(),
            'image' => $logoUrl,
            'logo' => $logoUrl,
            'telephone' => $phone ?: null,
            'email' => $email ?: null,
            'address' => array_filter([
                '@type' => 'PostalAddress',
                // The footer shows a single address line. Keep schema aligned to that visible text.
                'streetAddress' => $contactAddress ?: null,
                'addressLocality' => $orgConfig['city'] ?? 'Toronto',
                'addressRegion' => $orgConfig['province'] ?? 'Ontario',
                'postalCode' => $orgConfig['postal_code'] ?? null,
                'addressCountry' => $orgConfig['country'] ?? 'CA',
            ]),
            'areaServed' => $serviceArea
                ? [
                    '@type' => 'AdministrativeArea',
                    'name' => $serviceArea,
                ]
                : 'CA',
        ];
    }
}
