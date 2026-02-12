<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(GemstoneRepository $gemstones): Response
    {
        $staticUrls = [
            url('/'),
            url('/about'),
            url('/gemstones'),
            url('/education'),
            url('/education/certification'),
            url('/education/gia-vs-igi'),
            url('/education/natural-vs-treated'),
            url('/education/birthstones-vs-astrology'),
            url('/education/buying-gemstones-canada'),
            url('/contact'),
            url('/purchase-request'),
            url('/consultation'),
            url('/terms'),
            url('/privacy'),
            url('/disclaimer'),
            url('/refunds'),
            url('/faq'),
            url('/testimonials'),
        ];

        $gemstoneUrls = $gemstones->all()->map(function ($gemstone) {
            return url('/gemstones/' . $gemstone->slug);
        })->toArray();

        return response()
            ->view('sitemap', [
                'staticUrls' => $staticUrls,
                'gemstoneUrls' => $gemstoneUrls,
            ])
            ->header('Content-Type', 'application/xml');
    }
}
