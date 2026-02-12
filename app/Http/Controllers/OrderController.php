<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Repositories\PageRepository;
use App\Repositories\GemstoneRepository;

class OrderController extends Controller
{
    public function create(GemstoneRepository $gemstones, PageRepository $pages)
    {
        return view('pages.purchase-request', [
            'page' => $pages->getBySlug('purchase-request'),
            'gemstones' => $gemstones->all(),
        ]);
    }

    public function store(OrderRequest $request)
    {
        Order::create($request->validated());

        return back()->with('status', 'Thank you. Your purchase request has been received. We will confirm pricing, availability, and applicable taxes by email.');
    }
}
