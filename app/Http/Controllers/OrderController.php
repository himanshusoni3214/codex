<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\PageRepository;
use App\Repositories\GemstoneRepository;
use Illuminate\Support\Facades\DB;

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
        $data = $request->validated();
        $product = Product::query()->findOrFail($data['product_id']);
        $data['service_id'] = $this->resolveLegacyServiceId($product);

        Order::create($data);

        return back()->with('status', 'Thank you. Your purchase request has been received. We will confirm pricing, availability, and applicable taxes by email.');
    }

    private function resolveLegacyServiceId(Product $product): int
    {
        $existing = DB::table('services')->where('slug', $product->slug)->value('id');

        if ($existing) {
            return (int) $existing;
        }

        return (int) DB::table('services')->insertGetId([
            'title' => $product->title,
            'slug' => $product->slug,
            'short_description' => $product->short_description,
            'description' => $product->description ?: ($product->short_description ?: $product->title),
            'image' => $product->image,
            'meta_title' => $product->meta_title,
            'meta_description' => $product->meta_description,
            'is_featured' => (bool) $product->is_featured,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
