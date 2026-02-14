<?php

namespace App\Http\Controllers;

use App\Repositories\GemstoneRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Response;

class EducationController extends Controller
{
    public function index(PageRepository $pages)
    {
        return view('pages.education.index', [
            'page' => $pages->getBySlug('education'),
            'educationPages' => $pages->bySection('education'),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Education', 'url' => route('education')],
            ],
        ]);
    }

    public function certification()
    {
        return view('pages.education.certification', [
            'breadcrumbs' => $this->breadcrumbs('Gemstone Certification Explained'),
        ]);
    }

    public function giaVsIgi()
    {
        return view('pages.education.gia-vs-igi', [
            'breadcrumbs' => $this->breadcrumbs('GIA vs IGI'),
        ]);
    }

    public function naturalVsTreated()
    {
        return view('pages.education.natural-vs-treated', [
            'breadcrumbs' => $this->breadcrumbs('Natural vs Treated Gemstones'),
        ]);
    }

    public function birthstonesVsAstrology()
    {
        return view('pages.education.birthstones-vs-astrology', [
            'breadcrumbs' => $this->breadcrumbs('Birthstones vs Traditional Stones'),
        ]);
    }

    public function buyingInCanada()
    {
        return view('pages.education.buying-in-canada', [
            'breadcrumbs' => $this->breadcrumbs('Buying Gemstones in Canada'),
        ]);
    }

    public function show(string $slug, PageRepository $pages, GemstoneRepository $gemstones): Response
    {
        $page = $pages->getBySectionAndSlug('education', $slug);
        abort_if(! $page, 404);

        return response()->view('pages.education.show', [
            'page' => $page,
            'breadcrumbs' => $this->breadcrumbs($page->title),
            'relatedGemstones' => $gemstones->availableTypes()->take(6),
            'relatedGuides' => $pages->bySection('education')
                ->where('slug', '!=', $slug)
                ->take(6),
        ]);
    }

    private function breadcrumbs(string $title): array
    {
        return [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Education', 'url' => route('education')],
            ['label' => $title, 'url' => url()->current()],
        ];
    }
}
