<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationRequest;
use App\Models\Consultation;
use App\Repositories\PageRepository;

class ConsultationController extends Controller
{
    public function create(PageRepository $pages)
    {
        return view('pages.consultation', [
            'page' => $pages->getBySlug('consultation'),
        ]);
    }

    public function store(ConsultationRequest $request)
    {
        Consultation::create($request->validated());

        return back()->with('status', 'Your consultation request has been received. We will follow up with scheduling details.');
    }
}
