<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Response;

class EngagementRingController extends Controller
{
    public function index(PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getBySectionAndSlug('engagement_hub', 'engagement-rings')
            ?? $pages->getBySlug('engagement-rings');

        $items = $pages->publishedBySection('engagement')
            ->map(function ($entry) {
                $entry->setAttribute('url', route('engagement.show', ['slug' => $entry->slug]));

                return $entry;
            })
            ->values();

        return response()->view('pages.seo.hub', [
            'page' => $page,
            'items' => $items,
            'hubType' => 'engagement',
            'hubEyebrow' => 'Engagement Rings',
            'hubTitle' => $page?->hero_title ?: 'Colored Gemstone Engagement Rings in Toronto',
            'hubSubtitle' => $page?->hero_subtitle ?: 'Plan custom sapphire, ruby, and emerald engagement rings with transparent gemstone documentation and appointment-led design.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Engagement Rings', 'url' => route('engagement.index')],
            ],
            'relatedTypes' => $gemstones->availableTypes()->take(8),
            'ctaHeading' => 'Start your custom ring consultation',
            'ctaSubtitle' => 'Share timeline, style, and gemstone preference. We reply with CAD estimates and appointment options.',
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }

    public function show(string $slug, PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getPublishedBySectionAndSlug('engagement', $slug);
        abort_if(! $page, 404);

        return response()->view('pages.seo.detail', [
            'page' => $page,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Engagement Rings', 'url' => route('engagement.index')],
                ['label' => $page->title, 'url' => route('engagement.show', ['slug' => $page->slug])],
            ],
            'relatedInventory' => $gemstones->all()->whereIn('gem_type', ['Sapphire', 'Ruby', 'Emerald'])->take(6),
            'relatedInventoryTitle' => 'Suggested Stones for Custom Rings',
            'relatedGuides' => $pages->publishedBySection('education')->take(4),
            'sectionLabel' => 'Engagement Ring Guide',
            'ctaHeading' => 'Book an engagement ring appointment',
            'ctaSubtitle' => 'Get timeline planning, setting options, and certification-backed gemstone recommendations.',
            'isIndexable' => (bool) $page->is_indexable,
            'canonical' => route('engagement.show', ['slug' => $page->slug]),
            'includeLocalBusiness' => true,
            'localBusinessServiceArea' => 'Toronto, GTA, Ontario, Canada',
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }
}
