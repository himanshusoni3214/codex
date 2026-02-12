<?php

namespace App\Repositories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;

class TestimonialRepository
{
    public function all(): Collection
    {
        if (! Schema::hasTable('testimonials')) {
            return collect();
        }

        return Testimonial::orderByDesc('id')->get();
    }

    public function featured(int $limit = 6): Collection
    {
        if (! Schema::hasTable('testimonials')) {
            return collect();
        }

        return Testimonial::where('is_featured', true)
            ->orderByDesc('id')
            ->limit($limit)
            ->get();
    }
}
