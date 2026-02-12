<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Facades\Schema;

class PageRepository
{
    public function getBySlug(string $slug): ?Page
    {
        if (! Schema::hasTable('pages')) {
            return null;
        }

        return Page::where('slug', $slug)->first();
    }
}
