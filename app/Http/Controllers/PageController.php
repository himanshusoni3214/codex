<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;

class PageController extends Controller
{
    public function about(PageRepository $pages)
    {
        return view('pages.about', ['page' => $pages->getBySlug('about')]);
    }

    public function terms(PageRepository $pages)
    {
        return view('pages.terms', ['page' => $pages->getBySlug('terms')]);
    }

    public function privacy(PageRepository $pages)
    {
        return view('pages.privacy', ['page' => $pages->getBySlug('privacy')]);
    }

    public function faq(PageRepository $pages)
    {
        return view('pages.faq', ['page' => $pages->getBySlug('faq')]);
    }

    public function disclaimer(PageRepository $pages)
    {
        return view('pages.disclaimer', ['page' => $pages->getBySlug('disclaimer')]);
    }

    public function refunds(PageRepository $pages)
    {
        return view('pages.refunds', ['page' => $pages->getBySlug('refunds')]);
    }
}
