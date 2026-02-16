<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class AstrologyController extends Controller
{
    public function index(PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getBySectionAndSlug('astrology_hub', 'astrology')
            ?? $pages->getBySlug('astrology');

        $items = $pages->publishedBySection('astrology')
            ->map(function ($entry) {
                $entry->setAttribute('url', route('astrology.show', ['slug' => $entry->slug]));

                return $entry;
            })
            ->values();

        return response()->view('pages.seo.hub', [
            'page' => $page,
            'items' => $items,
            'hubType' => 'astrology',
            'hubEyebrow' => 'Traditional Guidance',
            'hubTitle' => $page?->hero_title ?: 'Astrology Gemstone Guidance in Toronto & GTA',
            'hubSubtitle' => $page?->hero_subtitle ?: 'Belief-based educational pages to help you compare traditional gemstone guidance with transparent product disclosures.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Astrology', 'url' => route('astrology.index')],
            ],
            'relatedTypes' => $gemstones->availableTypes()->take(8),
            'ctaHeading' => 'Need private guidance before buying?',
            'ctaSubtitle' => 'Book a traditional consultation or submit a purchase request for certified gemstones.',
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }

    public function show(string $slug, PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getPublishedBySectionAndSlug('astrology', $slug);
        abort_if(! $page, 404);

        $typeSlug = $this->mapAstrologySlugToType($slug);
        $relatedInventory = $typeSlug
            ? $gemstones->byType($typeSlug)->take(6)
            : collect();

        return response()->view('pages.seo.detail', [
            'page' => $page,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Astrology', 'url' => route('astrology.index')],
                ['label' => $page->title, 'url' => route('astrology.show', ['slug' => $page->slug])],
            ],
            'relatedInventory' => $relatedInventory,
            'relatedInventoryTitle' => $typeSlug ? 'Related Certified Inventory' : null,
            'relatedGuides' => $pages->publishedBySection('education')->take(4),
            'sectionLabel' => 'Astrology Stone Guide',
            'ctaHeading' => 'Book a private traditional consultation',
            'ctaSubtitle' => 'Belief-based guidance is optional and separate from gemstone purchase. No outcomes are guaranteed.',
            'isIndexable' => (bool) $page->is_indexable,
            'canonical' => route('astrology.show', ['slug' => $page->slug]),
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }

    private function mapAstrologySlugToType(string $slug): ?string
    {
        return match (Str::lower($slug)) {
            'blue-sapphire-neelam' => 'sapphire',
            'yellow-sapphire-pukhraj' => 'sapphire',
            'emerald-panna' => 'emerald',
            'ruby-manik' => 'ruby',
            'pearl-moti' => 'pearl',
            'hessonite-gomed' => 'hessonite',
            'cats-eye-lehsunia' => 'cats-eye',
            default => null,
        };
    }
}
