<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;
use App\Repositories\GemstoneRepository;
use App\Repositories\TestimonialRepository;

class HomeController extends Controller
{
    public function index(GemstoneRepository $gemstones, TestimonialRepository $testimonials, PageRepository $pages)
    {
        $page = $pages->getBySlug('home');

        return view('pages.home', [
            'page' => $page,
            'gemstones' => $gemstones->featured(),
            'testimonials' => $testimonials->featured(),
        ]);
    }
}
