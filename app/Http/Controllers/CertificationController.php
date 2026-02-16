<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Response;

class CertificationController extends Controller
{
    public function index(PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getBySectionAndSlug('certification_hub', 'certification')
            ?? $pages->getBySlug('certification');

        $items = $pages->publishedBySection('certification')
            ->map(function ($entry) {
                $entry->setAttribute('url', route('certification.show', ['slug' => $entry->slug]));

                return $entry;
            })
            ->values();

        return response()->view('pages.seo.hub', [
            'page' => $page,
            'items' => $items,
            'hubType' => 'certification',
            'hubEyebrow' => 'Certification Library',
            'hubTitle' => $page?->hero_title ?: 'Gemstone Certification Library',
            'hubSubtitle' => $page?->hero_subtitle ?: 'Understand report verification, treatment disclosures, and practical checks before you buy in Canada.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Certification', 'url' => route('certification.index')],
            ],
            'relatedTypes' => $gemstones->availableTypes()->take(8),
            'ctaHeading' => 'Need help validating a report?',
            'ctaSubtitle' => 'Book consultation support or share report details through purchase request.',
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }

    public function show(string $slug, PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getPublishedBySectionAndSlug('certification', $slug);
        abort_if(! $page, 404);

        return response()->view('pages.seo.detail', [
            'page' => $page,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Certification', 'url' => route('certification.index')],
                ['label' => $page->title, 'url' => route('certification.show', ['slug' => $page->slug])],
            ],
            'relatedInventory' => $gemstones->all()->take(6),
            'relatedInventoryTitle' => 'Certified Inventory Examples',
            'relatedGuides' => $pages->publishedBySection('astrology')->take(4),
            'sectionLabel' => 'Certification Guide',
            'ctaHeading' => 'Need a second check on certification details?',
            'ctaSubtitle' => 'Our team can review report format, disclosure notes, and listing alignment before purchase.',
            'isIndexable' => (bool) $page->is_indexable,
            'canonical' => route('certification.show', ['slug' => $page->slug]),
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }
}
