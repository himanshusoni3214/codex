<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Response;

class OriginController extends Controller
{
    public function show(
        string $type,
        string $origin,
        GemstoneRepository $gemstones,
        PageRepository $pages
    ): Response {
        return app(GemstoneSiloController::class)
            ->showScoped($type, $origin, $gemstones, $pages);
    }
}
