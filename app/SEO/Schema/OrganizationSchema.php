<?php

namespace App\SEO\Schema;

use App\Services\SeoUrlService;

final class OrganizationSchema
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function build(array $settings = []): array
    {
        $orgConfig = config('seo.organization', []);

        $siteName = (string) ($settings['site_name'] ?? config('seo.site_name', 'Natural Gem'));
        $phone = (string) ($settings['contact_phone'] ?? ($orgConfig['phone'] ?? '+1 (647) 555-0199'));
        $email = (string) ($settings['contact_email'] ?? ($orgConfig['email'] ?? 'hello@naturalgem.com'));

        $logoRef = $settings['logo_path']
            ?? config('seo.default_og_image')
            ?? '/images/natural-gem-logo.svg';
        $logoUrl = $this->seoUrlService->resolveImageReference($logoRef)
            ?: $this->seoUrlService->absolute('/images/natural-gem-logo.svg');

        // Only include "sameAs" if those social links are actually shown in the UI.
        // (We omit by default to keep schema strictly aligned with visible content.)

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $siteName,
            'url' => $this->seoUrlService->siteUrl(),
            'logo' => $logoUrl,
            'contactPoint' => array_filter([
                '@type' => 'ContactPoint',
                'telephone' => $phone ?: null,
                'email' => $email ?: null,
                'contactType' => 'customer support',
                'areaServed' => 'CA',
                'availableLanguage' => ['en'],
            ]),
        ];
    }
}

