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
        $faqItems = [
            ['question' => 'Do you provide certification?', 'answer' => 'Yes. We provide GIA or IGI reports when available and disclose report numbers for verification.'],
            ['question' => 'Are treatments disclosed?', 'answer' => 'Yes. Any known treatments are disclosed in each listing and reflected in documentation.'],
            ['question' => 'Is pricing in CAD?', 'answer' => 'All pricing is listed in CAD, with GST/HST calculated based on your province.'],
            ['question' => 'Do you offer consultations?', 'answer' => 'We offer a separate, belief-based consultation by appointment. It is optional and does not imply outcomes.'],
            ['question' => 'Can I request a custom stone?', 'answer' => 'Yes. Contact our team for bespoke sourcing and custom jewelry services.'],
        ];

        return view('pages.faq', [
            'page' => $pages->getBySlug('faq'),
            'faqItems' => $faqItems,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'FAQ', 'url' => route('faq')],
            ],
        ]);
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
