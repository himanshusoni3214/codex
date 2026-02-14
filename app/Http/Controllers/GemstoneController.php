<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\PageRepository;
use App\Repositories\GemstoneRepository;

class GemstoneController extends Controller
{
    public function index(GemstoneRepository $gemstones, PageRepository $pages)
    {
        return view('pages.gemstones', [
            'page' => $pages->getBySlug('gemstones'),
            'gemstones' => $gemstones->paginateAvailable(),
            'categories' => $gemstones->categories(),
            'gemstoneTypes' => $gemstones->availableTypes(),
            'origins' => $gemstones->availableOrigins(),
            'originGroups' => $gemstones->availableOriginsGroupedByType(),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Gemstones', 'url' => route('gemstones')],
            ],
        ]);
    }

    public function show(Product $gemstone)
    {
        return view('pages.gemstone-detail', [
            'gemstone' => $gemstone,
        ]);
    }
}
