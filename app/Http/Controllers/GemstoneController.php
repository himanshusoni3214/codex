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
            'gemstones' => $gemstones->all(),
            'categories' => $gemstones->categories(),
        ]);
    }

    public function show(Product $gemstone)
    {
        return view('pages.gemstone-detail', [
            'gemstone' => $gemstone,
        ]);
    }
}
