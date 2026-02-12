<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;

class EducationController extends Controller
{
    public function index(PageRepository $pages)
    {
        return view('pages.education.index', [
            'page' => $pages->getBySlug('education'),
        ]);
    }

    public function certification()
    {
        return view('pages.education.certification');
    }

    public function giaVsIgi()
    {
        return view('pages.education.gia-vs-igi');
    }

    public function naturalVsTreated()
    {
        return view('pages.education.natural-vs-treated');
    }

    public function birthstonesVsAstrology()
    {
        return view('pages.education.birthstones-vs-astrology');
    }

    public function buyingInCanada()
    {
        return view('pages.education.buying-in-canada');
    }
}
