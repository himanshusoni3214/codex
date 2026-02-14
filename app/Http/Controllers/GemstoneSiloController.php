<?php

namespace App\Http\Controllers;

use App\Models\GemstoneType;
use App\Models\Origin;
use App\Models\Product;
use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use App\Services\SeoUrlService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class GemstoneSiloController extends Controller
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function showTypeOrProduct(string $slug, GemstoneRepository $gemstones, PageRepository $pages): Response|RedirectResponse
    {
        $type = GemstoneType::query()->where('slug', $slug)->first();
        if ($type) {
            abort_if(! ($type->is_indexable ?? true), 404);
            return $this->renderSilo($type, null, $gemstones, $pages);
        }

        // Preserve existing product detail URLs under /gemstones/{slug}.
        $product = Product::query()
            ->with(['gemstoneTypes', 'origins'])
            ->where('slug', $slug)
            ->firstOrFail();

        $canonicalPath = $product->detailPath();
        if ($canonicalPath !== request()->getPathInfo()) {
            return redirect($canonicalPath, 301);
        }

        return $this->renderProductDetail($product, $pages);
    }

    public function showScoped(
        string $typeSlug,
        string $originOrProductSlug,
        GemstoneRepository $gemstones,
        PageRepository $pages
    ): Response {
        $type = GemstoneType::query()
            ->where('slug', $typeSlug)
            ->firstOrFail();
        abort_if(! ($type->is_indexable ?? true), 404);

        $origin = Origin::query()
            ->where('slug', $originOrProductSlug)
            ->first();

        if ($origin && $this->originBelongsToType($origin, $type)) {
            abort_if(! ($origin->is_indexable ?? true), 404);
            return $this->renderSilo($type, $origin, $gemstones, $pages);
        }

        $product = $this->findProductForTypeSlug($originOrProductSlug, $type);

        if (! $product) {
            abort(404);
        }

        $productOrigin = $product->origins
            ->first(fn (Origin $candidate) => $this->originBelongsToType($candidate, $type))
            ?: $product->primary_origin;

        return $this->renderProductDetail($product, $pages, $type, $productOrigin);
    }

    public function showOrigin(GemstoneType $type, Origin $origin, GemstoneRepository $gemstones, PageRepository $pages): Response
    {
        abort_if(! ($type->is_indexable ?? true), 404);
        abort_if(! ($origin->is_indexable ?? true), 404);

        if ($origin->gemstone_type_id !== null && $origin->gemstone_type_id !== $type->id) {
            abort(404);
        }

        return $this->renderSilo($type, $origin, $gemstones, $pages);
    }

    private function renderProductDetail(
        Product $product,
        PageRepository $pages,
        ?GemstoneType $type = null,
        ?Origin $origin = null
    ): Response {
        $primaryType = $type ?: $product->primary_gemstone_type;
        $primaryOrigin = $origin ?: $product->primary_origin;
        $typeSlug = $primaryType?->slug ?: ($product->gem_type ? Str::slug($product->gem_type) : null);

        $faqItems = $this->productFaqItems($product);

        return response()
            ->view('pages.gemstone-detail', [
                'gemstone' => $product,
                'type' => $primaryType,
                'origin' => $primaryOrigin,
                'faqItems' => $faqItems,
                'relatedEducation' => $pages->bySection('education')->take(3),
                'breadcrumbs' => $this->productBreadcrumbs($product, $primaryType, $primaryOrigin),
                'typeLink' => $typeSlug ? route('gemstones.show', ['slug' => $typeSlug]) : null,
                'originLink' => ($typeSlug && $primaryOrigin)
                    ? route('gemstones.silo.origin', ['type' => $typeSlug, 'origin' => $primaryOrigin->slug])
                    : null,
                'canonical' => $this->seoUrlService->absolute($product->detailPath($typeSlug)),
            ])
            ->header('Cache-Control', app()->environment('production')
                ? 'public, max-age=600, stale-while-revalidate=120'
                : 'no-cache, private');
    }

    private function renderSilo(GemstoneType $type, ?Origin $origin, GemstoneRepository $gemstones, PageRepository $pages): Response
    {
        $items = $origin
            ? $gemstones->byTypeAndOriginPaginated($type->slug, $origin->slug)
            : $gemstones->byTypePaginated($type->slug);

        $contextTitle = $origin ? "{$origin->name} {$type->name}" : $type->name;
        $faqItems = $origin?->resolved_faq_items ?: $type->resolved_faq_items ?: $this->defaultFaq($contextTitle);
        $historyContent = $origin?->resolved_history ?: $type->resolved_history;
        $buyingGuideContent = $origin?->resolved_buying_guide ?: $type->resolved_buying_guide;
        $certificationContent = $origin?->resolved_certification ?: $type->resolved_certification;
        $treatmentContent = $origin?->resolved_treatment ?: $type->resolved_treatment;
        $introContent = $origin?->resolved_intro ?: $type->resolved_intro;

        $productCount = $items instanceof LengthAwarePaginator ? $items->total() : $items->count();
        $hasStrongContent = mb_strlen(strip_tags(
            (string) ($introContent . $historyContent . $buyingGuideContent . $certificationContent . $treatmentContent)
        )) >= config('seo.thin_content.min_content_chars', 500);
        $warningThreshold = config('seo.thin_content.warning_product_threshold', 3);
        $showThinContentWarning = $productCount > 0 && $productCount < $warningThreshold;
        $forceNoindex = $productCount === 0 && ! $hasStrongContent;

        $page = (object) [
            'title' => $origin ? "{$type->name} from {$origin->name}" : $type->name,
            'meta_title' => $origin?->resolved_seo_title ?: $type->resolved_seo_title ?: "Buy {$contextTitle} in Canada | Certified Natural Gemstones",
            'meta_description' => $origin?->resolved_seo_description ?: $type->resolved_seo_description ?: "Shop certified {$contextTitle} in Canada with transparent CAD pricing, treatment disclosures, and documentation.",
            'canonical_url' => $origin?->canonical_url ?: $type->canonical_url,
            'og_image' => $origin?->resolved_og_image ?: $type->resolved_og_image,
            'schema_json' => $origin?->resolved_schema_json ?: $type->resolved_schema_json,
        ];

        return response()->view('pages.gemstone-silo', [
            'page' => $page,
            'type' => $type,
            'origin' => $origin,
            'gemstones' => $items,
            'faqItems' => $faqItems,
            'introContent' => $introContent,
            'historyContent' => $historyContent,
            'buyingGuideContent' => $buyingGuideContent,
            'certificationContent' => $certificationContent,
            'treatmentContent' => $treatmentContent,
            'relatedEducation' => $pages->bySection('education')->take(3),
            'breadcrumbs' => $this->breadcrumbsFor($type, $origin),
            'forceNoindex' => $forceNoindex,
            'isIndexable' => (bool) ($origin?->is_indexable ?? $type->is_indexable ?? true),
            'showThinContentWarning' => $showThinContentWarning,
            'warningThreshold' => $warningThreshold,
        ]);
    }

    private function breadcrumbsFor(GemstoneType $type, ?Origin $origin): array
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Gemstones', 'url' => route('gemstones')],
            ['label' => $type->name, 'url' => url('/gemstones/' . $type->slug)],
        ];

        if ($origin) {
            $breadcrumbs[] = ['label' => $origin->name, 'url' => url()->current()];
        }

        return $breadcrumbs;
    }

    private function defaultFaq(string $contextTitle): array
    {
        $context = Str::lower($contextTitle);

        return [
            [
                'question' => "How do I verify {$context} before buying in Canada?",
                'answer' => 'Ask for a lab certificate number, treatment disclosure, and clear return terms before purchase.',
            ],
            [
                'question' => 'Are prices listed in CAD?',
                'answer' => 'Yes. Product pages and quotes are CAD-first for Canadian buyers.',
            ],
            [
                'question' => 'Do you disclose gemstone treatments?',
                'answer' => 'Yes. Any known treatment status is disclosed on the listing or report documents.',
            ],
            [
                'question' => 'Do gemstone purchases include guarantees of outcomes?',
                'answer' => 'No. Gemstones are sold as physical products with educational and cultural context only.',
            ],
            [
                'question' => 'How is tax handled for Canadian orders?',
                'answer' => 'GST/HST is applied based on the shipping province at checkout.',
            ],
        ];
    }

    private function productBreadcrumbs(Product $product, ?GemstoneType $type, ?Origin $origin): array
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Gemstones', 'url' => route('gemstones')],
        ];

        $typeSlug = $type?->slug ?: ($product->gem_type ? Str::slug($product->gem_type) : null);
        if ($typeSlug) {
            $breadcrumbs[] = [
                'label' => $type?->name ?: $product->gem_type,
                'url' => route('gemstones.show', ['slug' => $typeSlug]),
            ];
        }

        if ($origin && $typeSlug) {
            $breadcrumbs[] = [
                'label' => $origin->name,
                'url' => route('gemstones.silo.origin', ['type' => $typeSlug, 'origin' => $origin->slug]),
            ];
        }

        $breadcrumbs[] = [
            'label' => $product->title,
            'url' => $this->seoUrlService->absolute($product->detailPath($typeSlug)),
        ];

        return $breadcrumbs;
    }

    private function originBelongsToType(Origin $origin, GemstoneType $type): bool
    {
        if ($origin->gemstone_type_id !== null) {
            return $origin->gemstone_type_id === $type->id;
        }

        return $origin->products()
            ->whereHas('gemstoneTypes', fn (Builder $q) => $q->where('gemstone_types.id', $type->id))
            ->exists();
    }

    private function findProductForTypeSlug(string $productSlug, GemstoneType $type): ?Product
    {
        $query = Product::query()
            ->with(['gemstoneTypes', 'origins'])
            ->where(function (Builder $query) use ($type): void {
                $query->whereHas('gemstoneTypes', fn (Builder $sub) => $sub->where('gemstone_types.id', $type->id))
                    ->orWhere(function (Builder $legacy) use ($type): void {
                        $legacy->whereNotNull('gem_type')
                            ->whereRaw("lower(replace(gem_type, ' ', '-')) = ?", [Str::lower($type->slug)]);
                    });
            });

        $direct = (clone $query)
            ->where('slug', $productSlug)
            ->first();
        if ($direct) {
            return $direct;
        }

        return $query
            ->get()
            ->first(fn (Product $candidate) => $candidate->seo_slug === $productSlug);
    }

    private function productFaqItems(Product $product): array
    {
        $typeLabel = $product->gem_type ?: optional($product->primary_gemstone_type)->name ?: 'gemstone';
        $typeLabelLower = Str::lower($typeLabel);

        return [
            [
                'question' => "Is this {$typeLabelLower} natural?",
                'answer' => 'Yes. The listing is for a natural gemstone, and any known treatment status is disclosed before purchase.',
            ],
            [
                'question' => "Is this {$typeLabelLower} treated?",
                'answer' => 'Treatment information is listed in the disclosure section and reflected in available documentation where applicable.',
            ],
            [
                'question' => 'Can I verify the certification report?',
                'answer' => 'Yes. You can review the certificate number and, when available, use the direct report link for verification.',
            ],
            [
                'question' => 'Do you ship across Canada?',
                'answer' => 'Yes. Orders are shipped across Canada with insured delivery options and tracking.',
            ],
            [
                'question' => 'What taxes apply to gemstone purchases in Canada?',
                'answer' => 'GST/HST is calculated according to your shipping province at checkout.',
            ],
        ];
    }
}
