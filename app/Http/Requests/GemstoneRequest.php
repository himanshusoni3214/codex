<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GemstoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $gemstoneId = $this->route('gemstone')?->id;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug,' . $gemstoneId],
            'gem_type' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'symbolic_meaning' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'price_cad' => ['nullable', 'numeric', 'min:0'],
            'certificate_lab' => ['nullable', 'string', 'max:50'],
            'certificate_number' => ['nullable', 'string', 'max:100'],
            'certificate_url' => ['nullable', 'string', 'max:255'],
            'treatment' => ['nullable', 'string', 'max:255'],
            'origin' => ['nullable', 'string', 'max:255'],
            'carat' => ['nullable', 'numeric', 'min:0'],
            'color' => ['nullable', 'string', 'max:255'],
            'clarity' => ['nullable', 'string', 'max:255'],
            'cut' => ['nullable', 'string', 'max:255'],
            'shape' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
        ];
    }
}
