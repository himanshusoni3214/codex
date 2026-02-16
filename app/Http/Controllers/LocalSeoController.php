<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class LocalSeoController extends Controller
{
    public function toronto(PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getBySectionAndSlug('local', 'toronto-gemstone-store') ?? $pages->getBySlug('toronto-gemstone-store');

        return response()->view('pages.local.toronto-gemstone-store', [
            'page' => $page,
            'types' => $gemstones->availableTypes()->take(10),
            'origins' => $gemstones->availableOrigins()->take(10),
            'includeLocalBusiness' => true,
            'localBusinessServiceArea' => 'Toronto, GTA, Ontario, Canada',
            'isIndexable' => $page?->is_indexable ?? true,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Toronto Gemstone Store', 'url' => url()->current()],
            ],
        ]);
    }

    public function province(string $province, PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $slug = 'canada-' . Str::slug($province);
        $page = $pages->getBySectionAndSlug('province', $slug);
        abort_if(! $page, 404);

        return response()->view('pages.local.province', [
            'page' => $page,
            'province' => Str::title(str_replace('-', ' ', $province)),
            'types' => $gemstones->availableTypes()->take(10),
            'includeLocalBusiness' => true,
            'localBusinessServiceArea' => Str::title(str_replace('-', ' ', $province)) . ', Canada',
            'isIndexable' => $page?->is_indexable ?? true,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Canada', 'url' => url('/canada/ontario')],
                ['label' => Str::title(str_replace('-', ' ', $province)), 'url' => url()->current()],
            ],
        ]);
    }
}
