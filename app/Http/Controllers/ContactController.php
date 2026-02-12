<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Repositories\PageRepository;

class ContactController extends Controller
{
    public function show(PageRepository $pages)
    {
        return view('pages.contact', ['page' => $pages->getBySlug('contact')]);
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());

        return back()->with('status', 'Thank you. We will respond within one business day.');
    }
}
