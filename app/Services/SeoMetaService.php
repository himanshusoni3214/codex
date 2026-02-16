<?php

namespace App\Services;

use App\Models\SiteSeoSetting;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class SeoMetaService
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function resolve(array $context = []): array
    {
        /** @var Request $request */
        $request = $context['request'] ?? request();
        $page = $context['page'] ?? null;
        $gemstone = $context['gemstone'] ?? null;
        $type = $context['type'] ?? null;
        $origin = $context['origin'] ?? null;
        $settings = $context['settings'] ?? [];
        $canonicalOverride = $this->seoUrlService->makeAbsolute($context['canonical'] ?? null);
        $paginator = $context['paginator'] ?? null;
        $forceNoindex = (bool) ($context['force_noindex'] ?? false);

        $siteSeo = Schema::hasTable('site_seo_settings')
            ? SiteSeoSetting::query()->first()
            : null;
        $siteName = $siteSeo?->organization_name
            ?: ($settings['site_name'] ?? config('seo.site_name', 'Natural Gem Store'));
        $routeName = $request->route()?->getName();

        // IMPORTANT: If we are rendering a product page ($gemstone), product-level meta must take precedence
        // over type/origin silo meta to keep canonical + OG aligned to the actual product being viewed.
        $title = $context['title']
            ?? $page?->seo_title
            ?? $page?->meta_title
            ?? ($gemstone
                ? ($gemstone?->meta_title ?: $this->productTitle($gemstone, $siteName))
                : (($type?->seo_title ?? $type?->meta_title)
                    ?? ($origin?->seo_title ?? $origin?->meta_title)
                    ?? $this->defaultTitle($routeName, $siteName, $page, $gemstone, $type, $origin)));

        $description = $context['description']
            ?? $page?->seo_description
            ?? $page?->meta_description
            ?? ($gemstone
                ? ($gemstone?->meta_description
                    ?: $gemstone?->short_description
                    ?: $this->productDescription($gemstone, $type))
                : (($type?->seo_description ?? $type?->meta_description)
                    ?? ($origin?->seo_description ?? $origin?->meta_description)
                    ?? ($page?->excerpt ?: null)
                    ?? $this->defaultDescription($routeName, $page, $gemstone, $type, $origin)
                    ?? ($siteSeo?->default_meta_description ?: config('seo.default_meta_description'))));

        $resolvedCanonical = $context['canonical']
            ?? $page?->canonical_url
            ?? $type?->canonical_url
            ?? $origin?->canonical_url
            ?? null;
        $canonical = $canonicalOverride ?: $this->buildCanonicalUrl($request, $resolvedCanonical);

        $ogImage = $context['og_image']
            ?? $page?->og_image
            ?? $gemstone?->og_image
            ?? $gemstone?->image
            ?? $type?->resolved_og_image
            ?? $origin?->resolved_og_image
            ?? ($siteSeo?->default_og_image ?: null)
            ?? config('seo.default_og_image_id')
            ?? ($siteSeo?->logo_url ?: ($settings['logo_path'] ?? config('seo.default_og_image')));
        $ogImage = $this->seoUrlService->resolveImageReference($ogImage);

        $indexable = $this->resolveIndexability(
            $context['indexable'] ?? null,
            $page->is_indexable ?? null,
            $type->is_indexable ?? null,
            $origin->is_indexable ?? null,
            $forceNoindex,
            $this->hasDisallowedParameters($request) || $this->isNoindexRoute($routeName)
        );
        $robots = $context['robots'] ?? ($indexable ? 'index,follow' : 'noindex,follow');

        return [
            'title' => trim((string) $title),
            'description' => Str::limit(trim(strip_tags((string) $description)), 160, ''),
            'robots' => $robots,
            'canonical' => $canonical,
            'og_type' => $context['og_type'] ?? ($gemstone ? 'product' : 'website'),
            'og_title' => trim((string) $title),
            'og_description' => Str::limit(trim(strip_tags((string) $description)), 200, ''),
            'og_url' => $canonical,
            'og_image' => $ogImage,
            'twitter_card' => 'summary_large_image',
            'twitter_title' => trim((string) $title),
            'twitter_description' => Str::limit(trim(strip_tags((string) $description)), 200, ''),
            'twitter_image' => $ogImage,
            'prev_url' => $this->previousPageUrl($request, $paginator),
            'next_url' => $this->nextPageUrl($request, $paginator),
        ];
    }

    private function defaultTitle(
        ?string $routeName,
        string $siteName,
        mixed $page,
        mixed $gemstone,
        mixed $type,
        mixed $origin
    ): string {
        return match ($routeName) {
            'home' => "Certified Natural Gemstones in Canada | {$siteName}",
            'gemstones' => "Shop Certified Gemstones in Canada | {$siteName}",
            'gemstones.silo.origin' => "Buy {$type?->name} ({$origin?->name}) - CAD Pricing & Certs | {$siteName}",
            'gemstones.show' => $gemstone
                ? $this->productTitle($gemstone, $siteName)
                : "Buy {$type?->name} in Canada | Certified {$type?->name} | {$siteName}",
            'education' => "Gemstone Education | {$siteName} Education",
            'education.show' => ($page?->title ?: 'Gemstone Education') . " | {$siteName} Education",
            'education.certification' => "Gemstone Certification Explained | {$siteName} Education",
            'education.gia-vs-igi' => "GIA vs IGI | {$siteName} Education",
            'education.natural-vs-treated' => "Natural vs Treated Gemstones | {$siteName} Education",
            'education.buying-in-canada' => "Buying Gemstones in Canada | {$siteName} Education",
            'education.birthstones-vs-astrology' => "Birthstones vs Traditional Stones | {$siteName} Education",
            'astrology.index' => "Astrology Gemstone Guidance Toronto | {$siteName}",
            'astrology.show' => ($page?->title ?: 'Astrology Gemstone Guide') . " | {$siteName}",
            'certification.index' => "Gemstone Certification Library | {$siteName}",
            'certification.show' => ($page?->title ?: 'Certification Guide') . " | {$siteName}",
            'engagement.index' => "Colored Gemstone Engagement Rings Toronto | {$siteName}",
            'engagement.show' => ($page?->title ?: 'Engagement Ring Guide') . " | {$siteName}",
            'gta.show' => ($page?->title ?: 'GTA Gemstone Store') . " | {$siteName}",
            'blog.index' => "Gemstone Blog Canada | {$siteName}",
            'blog.show' => ($page?->title ?: 'Gemstone Blog') . " | {$siteName}",
            default => ($page?->title ? "{$page->title} | {$siteName}" : "{$siteName} Canada"),
        };
    }

    private function defaultDescription(
        ?string $routeName,
        mixed $page,
        mixed $gemstone,
        mixed $type,
        mixed $origin
    ): string {
        return match ($routeName) {
            'home' => 'Shop certified natural gemstones in Canada with transparent pricing, treatment disclosures, and documentation-first buying support.',
            'gemstones' => 'Browse certified gemstone inventory in Canada with clear CAD pricing, disclosure notes, and available stock visibility.',
            'gemstones.silo.origin' => "Explore {$type?->name} from {$origin?->name} with CAD pricing, certification context, and transparent treatment disclosures.",
            'education', 'education.show' => $page?->excerpt ?: 'Practical gemstone education for Canadian buyers, including certification and treatment disclosure guidance.',
            'education.certification' => 'Understand what gemstone certification covers and how Canadian buyers can verify report details before purchase.',
            'education.gia-vs-igi' => 'Compare GIA and IGI report formats and what each can tell Canadian gemstone buyers.',
            'education.natural-vs-treated' => 'Learn how natural and treated gemstones differ and why disclosure matters in responsible purchasing.',
            'education.buying-in-canada' => 'Review CAD pricing, GST/HST expectations, and documentation checks for buying gemstones in Canada.',
            'education.birthstones-vs-astrology' => 'Understand birthstone traditions and belief-based gemstone guidance in a compliance-safe context.',
            'astrology.index' => 'Browse belief-based astrology gemstone guides for Toronto and GTA buyers with transparent certification and disclosure links.',
            'astrology.show' => $page?->excerpt ?: 'Belief-based gemstone guide with disclosure-first buying checks and consultation options in Canada.',
            'certification.index' => 'Access gemstone certification guides for report verification, disclosure checks, and practical Canadian buying safeguards.',
            'certification.show' => $page?->excerpt ?: 'Certification guide for report interpretation, disclosure checks, and responsible gemstone buying in Canada.',
            'engagement.index' => 'Explore colored gemstone engagement ring planning in Toronto with custom appointment and certification-backed sourcing.',
            'engagement.show' => $page?->excerpt ?: 'Engagement ring guide for timeline planning, durability, and CAD-first custom design support.',
            'gta.show' => $page?->excerpt ?: 'Local GTA gemstone support with consultation, purchase request, and disclosure-first buying guidance.',
            'blog.index' => 'Natural Gem Store editorial blog with Canada-first gemstone education, certification tips, and disclosure guidance.',
            'blog.show' => $page?->excerpt ?: 'Gemstone education article for Canadian buyers focused on transparency and documentation.',
            'gemstones.show' => $gemstone
                ? "View {$gemstone->title} with CAD pricing, certification details, treatment disclosures, and current inventory status."
                : "Shop certified {$type?->name} in Canada with transparent pricing, disclosures, and documentation.",
            default => $page?->excerpt ?: ($gemstone?->gem_type ? "Shop certified {$gemstone->gem_type} in Canada with transparent pricing and disclosure details." : 'Shop certified natural gemstones in Canada with transparent pricing and disclosure details.'),
        };
    }

    private function productTitle(mixed $gemstone, string $siteName): string
    {
        $typeLabel = $gemstone->gem_type ?: optional($gemstone->primary_gemstone_type)->name ?: 'Gemstone';
        $carat = $this->resolveCaratValue($gemstone);
        $caratLabel = $carat ? number_format($carat, 2) . ' Ct ' : '';

        return "{$gemstone->title} - {$caratLabel}Natural {$typeLabel} | Buy Certified {$typeLabel} in Canada | {$siteName}";
    }

    private function productDescription(mixed $gemstone, mixed $type): string
    {
        $resolvedType = $gemstone->gem_type
            ?: optional($gemstone->primary_gemstone_type)->name
            ?: $type?->name
            ?: 'gemstone';
        $carat = $this->resolveCaratValue($gemstone);
        $caratLabel = $carat ? number_format($carat, 2) . ' ct' : 'certified';

        return "Buy {$caratLabel} natural {$resolvedType} in Canada. Certified, ethically sourced, with transparent treatment disclosure and documentation at Natural Gem Store.";
    }

    private function resolveCaratValue(mixed $gemstone): ?float
    {
        foreach (['carat', 'weight_per_piece', 'weight'] as $field) {
            $value = $gemstone?->{$field} ?? null;
            if ($value !== null && (float) $value > 0) {
                return (float) $value;
            }
        }

        return null;
    }

    private function buildCanonicalUrl(Request $request, ?string $resolvedCanonical): string
    {
        if ($resolvedCanonical) {
            return $this->seoUrlService->makeAbsolute($resolvedCanonical) ?? $this->seoUrlService->current($request);
        }

        $query = $request->query();
        $hasDisallowed = $this->hasDisallowedParameters($request);
        if ($hasDisallowed) {
            return $this->seoUrlService->current($request);
        }

        if (isset($query['page']) && (int) $query['page'] > 1 && count($query) === 1) {
            return $this->seoUrlService->current($request, ['page' => (int) $query['page']]);
        }

        return $this->seoUrlService->current($request);
    }

    private function hasDisallowedParameters(Request $request): bool
    {
        if (! config('seo.query_indexing.noindex_parameterized_pages')) {
            return false;
        }

        $queryKeys = array_keys($request->query());
        if ($queryKeys === []) {
            return false;
        }

        $allowed = config('seo.query_indexing.allowed_parameters', ['page']);
        $disallowed = array_diff($queryKeys, $allowed);

        return $disallowed !== [];
    }

    private function resolveIndexability(
        mixed $indexableOverride,
        mixed $pageIndexable,
        mixed $typeIndexable,
        mixed $originIndexable,
        bool $forceNoindex,
        bool $noindexForQuery
    ): bool {
        $indexable = true;
        if ($indexableOverride !== null) {
            $indexable = (bool) $indexableOverride;
        } elseif ($originIndexable !== null) {
            $indexable = (bool) $originIndexable;
        } elseif ($typeIndexable !== null) {
            $indexable = (bool) $typeIndexable;
        } elseif ($pageIndexable !== null) {
            $indexable = (bool) $pageIndexable;
        }

        if ($forceNoindex || $noindexForQuery) {
            return false;
        }

        return $indexable;
    }

    private function previousPageUrl(Request $request, mixed $paginator): ?string
    {
        if (! $paginator instanceof LengthAwarePaginator || $paginator->currentPage() <= 1) {
            return null;
        }

        $page = $paginator->currentPage() - 1;
        $query = $page > 1 ? ['page' => $page] : [];

        return $this->seoUrlService->current($request, $query);
    }

    private function nextPageUrl(Request $request, mixed $paginator): ?string
    {
        if (! $paginator instanceof LengthAwarePaginator || $paginator->currentPage() >= $paginator->lastPage()) {
            return null;
        }

        return $this->seoUrlService->current($request, ['page' => $paginator->currentPage() + 1]);
    }

    private function isNoindexRoute(?string $routeName): bool
    {
        return in_array($routeName, [
            'login',
            'login.store',
            'register',
            'register.store',
        ], true);
    }
}
