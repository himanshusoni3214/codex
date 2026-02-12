<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;
use App\Repositories\TestimonialRepository;

class TestimonialController extends Controller
{
    public function index(TestimonialRepository $testimonials, PageRepository $pages)
    {
        return view('pages.testimonials', [
            'page' => $pages->getBySlug('testimonials'),
            'testimonials' => $testimonials->all(),
        ]);
    }
}
