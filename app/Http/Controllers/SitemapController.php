<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use App\Repositories\GemstoneRepository;
use App\Services\SeoUrlService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class SitemapController extends Controller
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function index(GemstoneRepository $gemstones): Response
    {
        $cacheKey = 'sitemap.xml.' . md5($this->seoUrlService->siteUrl());

        $xml = Cache::remember($cacheKey, now()->addHours(6), function () use ($gemstones) {
            return view('sitemap', [
                'urls' => $this->buildUrls($gemstones),
            ])->render();
        });

        return response($xml)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function buildUrls(GemstoneRepository $gemstones): array
    {
        $urls = collect();
        $add = function (string $loc, ?string $lastmod = null, string $changefreq = 'weekly', string $priority = '0.7') use (&$urls): void {
            $urls->push([
                'loc' => $loc,
                'lastmod' => $lastmod ?: now()->toAtomString(),
                'changefreq' => $changefreq,
                'priority' => $priority,
            ]);
        };

        foreach ([
            ['/', 'daily', '1.0'],
            ['/about', 'monthly', '0.6'],
            ['/gemstones', 'daily', '0.9'],
            ['/education', 'weekly', '0.8'],
            ['/astrology', 'weekly', '0.8'],
            ['/certification', 'weekly', '0.8'],
            ['/engagement-rings', 'weekly', '0.8'],
            ['/blog', 'daily', '0.8'],
            ['/education/certification', 'monthly', '0.7'],
            ['/education/gia-vs-igi', 'monthly', '0.7'],
            ['/education/natural-vs-treated', 'monthly', '0.7'],
            ['/education/birthstones-vs-astrology', 'monthly', '0.6'],
            ['/education/buying-gemstones-canada', 'monthly', '0.8'],
            ['/toronto-gemstone-store', 'monthly', '0.8'],
            ['/canada/ontario', 'monthly', '0.7'],
            ['/contact', 'monthly', '0.5'],
            ['/purchase-request', 'weekly', '0.6'],
            ['/consultation', 'weekly', '0.5'],
            ['/terms', 'yearly', '0.3'],
            ['/privacy', 'yearly', '0.3'],
            ['/disclaimer', 'yearly', '0.3'],
            ['/refunds', 'yearly', '0.3'],
            ['/faq', 'monthly', '0.4'],
            ['/testimonials', 'monthly', '0.4'],
        ] as [$path, $changefreq, $priority]) {
            $add($this->seoUrlService->absolute($path), now()->toAtomString(), $changefreq, $priority);
        }

        $educationPages = Page::query()
            ->when(Schema::hasColumn('pages', 'section'), fn ($q) => $q->where('section', 'education'))
            ->when(Schema::hasColumn('pages', 'status'), fn ($q) => $q->where('status', 'published'))
            ->when(Schema::hasColumn('pages', 'is_indexable'), fn ($q) => $q->where('is_indexable', true))
            ->get();
        foreach ($educationPages as $page) {
            if (in_array($page->slug, ['education', 'certification', 'gia-vs-igi', 'natural-vs-treated', 'birthstones-vs-astrology', 'buying-gemstones-canada'], true)) {
                continue;
            }
            $add($this->seoUrlService->absolute('/education/' . $page->slug), $page->updated_at?->toAtomString(), 'monthly', '0.7');
        }

        $provincePages = Page::query()
            ->when(Schema::hasColumn('pages', 'section'), fn ($q) => $q->where('section', 'province'))
            ->when(Schema::hasColumn('pages', 'status'), fn ($q) => $q->where('status', 'published'))
            ->get();
        foreach ($provincePages as $page) {
            $provinceSlug = Str::after($page->slug, 'canada-');
            if ($provinceSlug === 'ontario' || $provinceSlug === $page->slug) {
                continue;
            }

            $add($this->seoUrlService->absolute('/canada/' . $provinceSlug), $page->updated_at?->toAtomString(), 'monthly', '0.7');
        }

        $sectionPrefix = [
            'astrology' => '/astrology',
            'certification' => '/certification',
            'engagement' => '/engagement-rings',
            'gta' => '/gta',
            'blog' => '/blog',
        ];

        $dynamicSectionPages = Page::query()
            ->whereIn('section', array_keys($sectionPrefix))
            ->when(Schema::hasColumn('pages', 'status'), fn ($q) => $q->where('status', 'published'))
            ->when(Schema::hasColumn('pages', 'is_indexable'), fn ($q) => $q->where('is_indexable', true))
            ->get();

        foreach ($dynamicSectionPages as $page) {
            $prefix = $sectionPrefix[$page->section] ?? null;
            if (! $prefix) {
                continue;
            }

            $changefreq = $page->section === 'blog' ? 'weekly' : 'monthly';
            $priority = $page->section === 'blog' ? '0.7' : '0.75';
            $add($this->seoUrlService->absolute($prefix . '/' . $page->slug), $page->updated_at?->toAtomString(), $changefreq, $priority);
        }

        $hubSectionMap = [
            'astrology_hub' => '/astrology',
            'certification_hub' => '/certification',
            'engagement_hub' => '/engagement-rings',
        ];

        $hubPages = Page::query()
            ->whereIn('section', array_keys($hubSectionMap))
            ->when(Schema::hasColumn('pages', 'status'), fn ($q) => $q->where('status', 'published'))
            ->when(Schema::hasColumn('pages', 'is_indexable'), fn ($q) => $q->where('is_indexable', true))
            ->get();

        foreach ($hubPages as $page) {
            $path = $hubSectionMap[$page->section] ?? null;
            if (! $path) {
                continue;
            }

            $add($this->seoUrlService->absolute($path), $page->updated_at?->toAtomString(), 'weekly', '0.8');
        }

        if (app()->environment('production')) {
            $productsQuery = Product::query()
                ->whereNotNull('sku')
                ->when(Schema::hasColumn('products', 'status'), fn (Builder $q) => $q->where('status', 'active'))
                ->when(Schema::hasColumn('products', 'is_published'), fn (Builder $q) => $q->where('is_published', true));

            $hasPiecesTable = Schema::hasTable('gemstone_pieces');
            $hasTotalQuantity = Schema::hasColumn('products', 'total_quantity');

            if ($hasPiecesTable) {
                $productsQuery->where(function (Builder $q) use ($hasTotalQuantity): void {
                    $q->whereHas('availablePieces', fn (Builder $pieces) => $pieces->available());

                    if ($hasTotalQuantity) {
                        $q->orWhere(function (Builder $legacy): void {
                            $legacy
                                ->whereDoesntHave('gemstonePieces')
                                ->where('total_quantity', '>', 0);
                        });
                    }
                });
            } elseif ($hasTotalQuantity) {
                $productsQuery->where('total_quantity', '>', 0);
            }

            $products = $productsQuery
                ->with('gemstoneTypes:id,slug')
                ->orderBy('updated_at', 'desc')
                ->get(['id', 'slug', 'sku', 'gem_type', 'updated_at']);

            foreach ($products as $gemstone) {
                $add(
                    $this->seoUrlService->absolute($gemstone->detailPath()),
                    $gemstone->updated_at?->toAtomString(),
                    'weekly',
                    '0.8'
                );
            }
        }

        foreach ($gemstones->availableTypes() as $type) {
            if (isset($type->is_indexable) && ! $type->is_indexable) {
                continue;
            }

            $add($this->seoUrlService->absolute('/gemstones/' . $type->slug), $type->updated_at?->toAtomString(), 'weekly', '0.8');
        }

        if (Schema::hasTable('gemstone_types') && Schema::hasTable('origins') && Schema::hasTable('product_gemstone_type') && Schema::hasTable('origin_product')) {
            $products = Product::query()
                ->whereNotNull('sku')
                ->where('status', 'active')
                ->whereHas('availablePieces', fn (Builder $q) => $q->available())
                ->with(['gemstoneTypes:id,slug,updated_at,is_indexable', 'origins:id,slug,updated_at,is_indexable'])
                ->get();

            $originLanding = [];
            foreach ($products as $product) {
                foreach ($product->gemstoneTypes as $type) {
                    foreach ($product->origins as $origin) {
                        if ((isset($type->is_indexable) && ! $type->is_indexable) || (isset($origin->is_indexable) && ! $origin->is_indexable)) {
                            continue;
                        }

                        $key = $type->slug . '/' . $origin->slug;
                        $originLanding[$key] = [
                            'loc' => $this->seoUrlService->absolute('/gemstones/' . $key),
                            'lastmod' => collect([$product->updated_at, $type->updated_at, $origin->updated_at])
                                ->filter()
                                ->max()?->toAtomString() ?? now()->toAtomString(),
                        ];
                    }
                }
            }

            foreach ($originLanding as $item) {
                $add($item['loc'], $item['lastmod'], 'weekly', '0.7');
            }
        }

        if (Schema::hasTable('gemstone_types') && Schema::hasTable('origins') && Schema::hasColumn('origins', 'gemstone_type_id')) {
            $origins = \App\Models\Origin::query()
                ->with('gemstoneType:id,slug,updated_at,is_indexable')
                ->whereNotNull('gemstone_type_id')
                ->whereHas('products', fn (Builder $q) => $q
                    ->whereNotNull('sku')
                    ->where('status', 'active')
                    ->whereHas('availablePieces', fn (Builder $pieces) => $pieces->available()))
                ->get();

            foreach ($origins as $origin) {
                $type = $origin->gemstoneType;
                if (! $type) {
                    continue;
                }

                if ((isset($origin->is_indexable) && ! $origin->is_indexable) || (isset($type->is_indexable) && ! $type->is_indexable)) {
                    continue;
                }

                $lastmod = collect([$origin->updated_at, $type->updated_at])->filter()->max()?->toAtomString();
                $add(
                    $this->seoUrlService->absolute('/gemstones/' . $type->slug . '/' . $origin->slug),
                    $lastmod,
                    'weekly',
                    '0.7'
                );
            }
        }

        return $urls
            ->unique('loc')
            ->values()
            ->all();
    }
}
