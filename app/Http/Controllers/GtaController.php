<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class GtaController extends Controller
{
    public function show(string $location, PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getPublishedBySectionAndSlug('gta', $location);
        abort_if(! $page, 404);

        $cityName = Str::of($location)
            ->replace('-gemstone-store', '')
            ->replace('-', ' ')
            ->title()
            ->toString();

        $testimonials = [
            [
                'quote' => 'Clear certification details and no pressure. We shortlisted stones online and finalized in one appointment.',
                'name' => 'GTA Client',
            ],
            [
                'quote' => 'Documentation and disclosure were straightforward. Shipping and pickup options were clearly explained.',
                'name' => 'Toronto Buyer',
            ],
        ];

        return response()->view('pages.local.gta', [
            'page' => $page,
            'cityName' => $cityName,
            'types' => $gemstones->availableTypes()->take(10),
            'testimonials' => $testimonials,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'GTA', 'url' => route('local.toronto')],
                ['label' => $cityName . ' Gemstone Store', 'url' => route('gta.show', ['location' => $location])],
            ],
            'isIndexable' => (bool) $page->is_indexable,
            'canonical' => route('gta.show', ['location' => $location]),
            'includeLocalBusiness' => true,
            'localBusinessServiceArea' => $cityName . ', Ontario, Canada',
        ])->header('Cache-Control', app()->environment('production')
            ? 'public, max-age=900, stale-while-revalidate=120'
            : 'no-cache, private');
    }
}
