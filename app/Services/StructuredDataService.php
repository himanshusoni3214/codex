<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Str;

class StructuredDataService
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function build(array $context = []): array
    {
        $settings = $context['settings'] ?? [];
        $breadcrumbs = $context['breadcrumbs'] ?? [];
        $faqItems = $context['faqItems'] ?? [];
        $product = $context['gemstone'] ?? ($context['product'] ?? null);

        $schemas = [
            $this->organization($settings),
            $this->website($settings),
        ];

        if ($this->shouldIncludeLocalBusiness($context)) {
            $schemas[] = $this->localBusiness($settings);
        }

        if ($breadcrumbs !== []) {
            $schemas[] = $this->breadcrumbs($breadcrumbs);
        }

        if ($product instanceof Product) {
            $schemas[] = $this->product($product);
        }

        if ($faqItems !== []) {
            $faqSchema = $this->faq($faqItems);
            if ($faqSchema !== null) {
                $schemas[] = $faqSchema;
            }
        }

        return array_values(array_filter($schemas));
    }

    public function organization(array $settings = []): array
    {
        $siteName = $this->siteName($settings);
        $logoUrl = $this->logoUrl($settings);

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $siteName,
            'url' => $this->seoUrlService->siteUrl(),
            'logo' => $logoUrl,
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => $this->phone($settings),
                'email' => $this->email($settings),
                'contactType' => 'customer support',
                'areaServed' => 'CA',
                'availableLanguage' => ['en'],
            ],
        ];
    }

    public function website(array $settings = []): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $this->siteName($settings),
            'url' => $this->seoUrlService->siteUrl(),
        ];
    }

    public function localBusiness(array $settings = []): array
    {
        $organization = config('seo.organization', []);

        return [
            '@context' => 'https://schema.org',
            '@type' => 'JewelryStore',
            'name' => $this->siteName($settings),
            'url' => $this->seoUrlService->siteUrl(),
            'image' => $this->logoUrl($settings),
            'logo' => $this->logoUrl($settings),
            'telephone' => $this->phone($settings),
            'email' => $this->email($settings),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $settings['contact_address'] ?? ($organization['address_line'] ?? 'Toronto'),
                'addressLocality' => $organization['city'] ?? 'Toronto',
                'addressRegion' => $organization['province'] ?? 'Ontario',
                'postalCode' => $organization['postal_code'] ?? null,
                'addressCountry' => $organization['country'] ?? 'CA',
            ],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '10:00',
                    'closes' => '18:00',
                ],
            ],
        ];
    }

    public function breadcrumbs(array $crumbs): ?array
    {
        $itemList = collect($crumbs)
            ->filter(fn ($crumb) => ! empty($crumb['label']))
            ->values()
            ->map(function ($crumb, int $index) {
                $absoluteUrl = $this->seoUrlService->forceSiteHost(
                    $crumb['url'] ?? $this->seoUrlService->current(request())
                );

                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'item' => [
                        '@id' => $absoluteUrl,
                        'name' => $crumb['label'],
                    ],
                ];
            })
            ->all();

        if ($itemList === []) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemList,
        ];
    }

    public function product(Product $product): array
    {
        $typeSlug = $product->primary_type_slug;
        $price = $this->productPrice($product);

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->title,
            'image' => [$this->productImage($product)],
            'description' => trim(strip_tags((string) ($product->short_description ?: $product->description ?: $product->title))),
            'sku' => (string) $product->sku,
            'brand' => [
                '@type' => 'Brand',
                'name' => 'Natural Gem',
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => number_format($price, 2, '.', ''),
                'priceCurrency' => 'CAD',
                'availability' => $product->available_quantity > 0
                    ? 'https://schema.org/InStock'
                    : 'https://schema.org/OutOfStock',
                'url' => $this->seoUrlService->absolute($product->detailPath($typeSlug)),
            ],
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

        return $schema;
    }

    public function faq(array $qaPairs): ?array
    {
        $mainEntity = collect($qaPairs)
            ->filter(fn ($item) => ! empty($item['question']) && ! empty($item['answer']))
            ->map(function ($item) {
                return [
                    '@type' => 'Question',
                    'name' => strip_tags((string) $item['question']),
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => strip_tags((string) $item['answer']),
                    ],
                ];
            })
            ->values()
            ->all();

        if ($mainEntity === []) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $mainEntity,
        ];
    }

    private function shouldIncludeLocalBusiness(array $context): bool
    {
        if (($context['includeLocalBusiness'] ?? false) === true) {
            return true;
        }

        $routeName = request()->route()?->getName();
        if (! is_string($routeName)) {
            return false;
        }

        return $routeName === 'contact' || Str::startsWith($routeName, 'local.');
    }

    private function siteName(array $settings): string
    {
        return (string) ($settings['site_name'] ?? config('seo.site_name', 'Natural Gem'));
    }

    private function logoUrl(array $settings): string
    {
        $logo = $settings['logo_path']
            ?? config('seo.default_og_image')
            ?? '/images/natural-gem-logo.svg';

        return (string) ($this->seoUrlService->resolveImageReference($logo) ?: $this->seoUrlService->absolute('/images/natural-gem-logo.svg'));
    }

    private function phone(array $settings): string
    {
        return (string) ($settings['contact_phone'] ?? (config('seo.organization.phone') ?: '+1 (647) 555-0199'));
    }

    private function email(array $settings): string
    {
        return (string) ($settings['contact_email'] ?? (config('seo.organization.email') ?: 'hello@naturalgem.com'));
    }

    private function productImage(Product $product): string
    {
        if (method_exists($product, 'hasMedia') && $product->hasMedia('images')) {
            $media = $product->getFirstMedia('images');
            if ($media) {
                return (string) $this->seoUrlService->resolveImageReference($media->getUrl());
            }
        }

        $image = $product->image ?: '/images/gemstones/emerald.svg';

        return (string) ($this->seoUrlService->resolveImageReference($image) ?: $this->seoUrlService->absolute('/images/gemstones/emerald.svg'));
    }

    private function productPrice(Product $product): float
    {
        if ($product->price_cad !== null) {
            return (float) $product->price_cad;
        }

        if ($product->display_rate_per_carat !== null && $product->weight_per_piece !== null) {
            return round((float) $product->display_rate_per_carat * (float) $product->weight_per_piece, 2);
        }

        return 0.0;
    }
}

