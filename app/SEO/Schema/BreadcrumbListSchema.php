<?php

namespace App\SEO\Schema;

use App\Services\SeoUrlService;

final class BreadcrumbListSchema
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    /**
     * @param  array<int, array{label?: string, name?: string, url?: string}>  $crumbs
     */
    public function build(array $crumbs): ?array
    {
        $items = collect($crumbs)
            ->map(function ($crumb, int $index) {
                $name = trim((string) ($crumb['label'] ?? $crumb['name'] ?? ''));
                if ($name === '') {
                    return null;
                }

                $url = (string) ($crumb['url'] ?? '');
                $absoluteUrl = $this->seoUrlService->forceSiteHost($url ?: $this->seoUrlService->current(request()));

                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $name,
                    'item' => $absoluteUrl,
                ];
            })
            ->filter()
            ->values()
            ->all();

        if ($items === []) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }
}

