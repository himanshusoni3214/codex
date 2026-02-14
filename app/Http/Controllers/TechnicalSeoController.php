<?php

namespace App\Http\Controllers;

use App\Services\SeoUrlService;
use Illuminate\Http\Response;

class TechnicalSeoController extends Controller
{
    public function __construct(
        private SeoUrlService $seoUrlService
    ) {
    }

    public function robots(): Response
    {
        $content = implode("\n", [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            'Disallow: /login',
            'Disallow: /register',
            'Disallow: /password',
            'Disallow: /password/*',
            'Disallow: /filament',
            'Disallow: /horizon',
            'Disallow: /telescope',
            'Sitemap: ' . $this->seoUrlService->absolute('/sitemap.xml'),
        ]);

        return response($content, 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
