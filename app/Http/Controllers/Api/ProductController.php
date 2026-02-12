<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($type = $request->query('type')) {
            $query->where('product_type', $type);
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        return $query->paginate(25);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug'],
            'product_type' => ['required', 'string'],
            'status' => ['required', 'string'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'price_cad' => ['nullable', 'numeric', 'min:0'],
            'gem_type' => ['nullable', 'string', 'max:255'],
            'treatment' => ['nullable', 'string', 'max:255'],
            'certificate_lab' => ['nullable', 'string', 'max:255'],
            'certificate_number' => ['nullable', 'string', 'max:255'],
            'certificate_url' => ['nullable', 'string', 'max:255'],
            'origin' => ['nullable', 'string', 'max:255'],
            'carat' => ['nullable', 'numeric', 'min:0'],
            'color' => ['nullable', 'string', 'max:255'],
            'clarity' => ['nullable', 'string', 'max:255'],
            'cut' => ['nullable', 'string', 'max:255'],
            'shape' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        return Product::create($data);
    }

    public function show(Product $product)
    {
        return $product->load(['category', 'tags', 'certifications']);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => ['sometimes', 'string', 'max:255'],
            'slug' => ['sometimes', 'string', 'max:255', 'unique:products,slug,' . $product->id],
            'product_type' => ['sometimes', 'string'],
            'status' => ['sometimes', 'string'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'price_cad' => ['nullable', 'numeric', 'min:0'],
            'gem_type' => ['nullable', 'string', 'max:255'],
            'treatment' => ['nullable', 'string', 'max:255'],
            'certificate_lab' => ['nullable', 'string', 'max:255'],
            'certificate_number' => ['nullable', 'string', 'max:255'],
            'certificate_url' => ['nullable', 'string', 'max:255'],
            'origin' => ['nullable', 'string', 'max:255'],
            'carat' => ['nullable', 'numeric', 'min:0'],
            'color' => ['nullable', 'string', 'max:255'],
            'clarity' => ['nullable', 'string', 'max:255'],
            'cut' => ['nullable', 'string', 'max:255'],
            'shape' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $product->update($data);

        return $product->refresh();
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
