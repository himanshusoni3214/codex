<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    public function publishedBySection(string $section): Collection
    {
        if (! Schema::hasTable('pages')) {
            return collect();
        }

        return Page::query()
            ->when(Schema::hasColumn('pages', 'section'), fn ($query) => $query->where('section', $section))
            ->when(Schema::hasColumn('pages', 'status'), fn ($query) => $query->where('status', 'published'))
            ->when(Schema::hasColumn('pages', 'is_indexable'), fn ($query) => $query->where('is_indexable', true))
            ->orderBy('title')
            ->get();
    }

    public function paginatePublishedBySection(string $section, int $perPage = 10): LengthAwarePaginator
    {
        if (! Schema::hasTable('pages')) {
            return new \Illuminate\Pagination\LengthAwarePaginator([], 0, $perPage);
        }

        return Page::query()
            ->when(Schema::hasColumn('pages', 'section'), fn ($query) => $query->where('section', $section))
            ->when(Schema::hasColumn('pages', 'status'), fn ($query) => $query->where('status', 'published'))
            ->when(Schema::hasColumn('pages', 'is_indexable'), fn ($query) => $query->where('is_indexable', true))
            ->latest('updated_at')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getPublishedBySectionAndSlug(string $section, string $slug): ?Page
    {
        if (! Schema::hasTable('pages')) {
            return null;
        }

        return Page::query()
            ->where('slug', $slug)
            ->when(Schema::hasColumn('pages', 'section'), fn ($query) => $query->where('section', $section))
            ->when(Schema::hasColumn('pages', 'status'), fn ($query) => $query->where('status', 'published'))
            ->when(Schema::hasColumn('pages', 'is_indexable'), fn ($query) => $query->where('is_indexable', true))
            ->first();
    }
}
