<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Collection;
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

    public function getBySectionAndSlug(string $section, string $slug): ?Page
    {
        if (! Schema::hasTable('pages')) {
            return null;
        }

        $query = Page::query()->where('slug', $slug);
        if (Schema::hasColumn('pages', 'section')) {
            $query->where('section', $section);
        }

        return $query->first();
    }

    public function bySection(string $section): Collection
    {
        if (! Schema::hasTable('pages')) {
            return collect();
        }

        $query = Page::query();
        if (Schema::hasColumn('pages', 'section')) {
            $query->where('section', $section);
        }
        if (Schema::hasColumn('pages', 'status')) {
            $query->where('status', 'published');
        }

        return $query->orderBy('title')->get();
    }
}
