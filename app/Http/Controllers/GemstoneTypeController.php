<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class GemstoneTypeController extends Controller
{
    public function show(string $typeSlug, GemstoneRepository $gemstones, PageRepository $pages): Response|RedirectResponse
    {
        // Keep /gemstones/{slug} backward-compatible:
        // If slug matches a GemstoneType, render type silo page,
        // otherwise fall back to the product detail route behavior.
        return app(GemstoneSiloController::class)
            ->showTypeOrProduct($typeSlug, $gemstones, $pages);
    }
}
