<?php

namespace App\SEO\Schema;

use App\Services\SeoUrlService;

final class WebSiteSchema
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function build(array $settings = []): array
    {
        $siteName = (string) ($settings['site_name'] ?? config('seo.site_name', 'Natural Gem Store'));

        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $siteName,
            'url' => $this->seoUrlService->siteUrl(),
        ];
    }
}

