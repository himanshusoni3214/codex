<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SeoUrlService
{
    public function siteUrl(): string
    {
        return rtrim(config('seo.site_url', config('app.url')), '/');
    }

    public function absolute(string $path = '/', array $query = []): string
    {
        $path = $this->normalizePath($path);
        $url = $this->siteUrl() . $path;

        if (! empty($query)) {
            $url .= '?' . Arr::query($query);
        }

        return $url;
    }

    public function current(Request $request, array $query = []): string
    {
        return $this->absolute($request->getPathInfo(), $query);
    }

    public function normalizePath(string $path): string
    {
        if ($path === '') {
            $path = '/';
        }

        if (! str_starts_with($path, '/')) {
            $path = '/' . $path;
        }

        if (
            config('seo.redirect.strip_trailing_slash')
            && $path !== '/'
            && str_ends_with($path, '/')
        ) {
            $path = rtrim($path, '/');
        }

        return $path;
    }

    public function makeAbsolute(?string $value): ?string
    {
        if (! $value) {
            return null;
        }

        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }

        return $this->absolute($value);
    }

    public function resolveImageReference(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_numeric($value)) {
            $mediaUrl = Media::query()->find((int) $value)?->getUrl();
            return $mediaUrl ? $this->makeAbsolute($mediaUrl) : null;
        }

        if (is_string($value)) {
            return $this->makeAbsolute($value);
        }

        return null;
    }

    public function forceSiteHost(?string $value): ?string
    {
        if (! $value) {
            return null;
        }

        $parsed = parse_url($value);
        if ($parsed === false) {
            return $this->makeAbsolute($value);
        }

        $path = $parsed['path'] ?? '/';
        $query = [];
        if (! empty($parsed['query'])) {
            parse_str($parsed['query'], $query);
        }

        return $this->absolute($path, $query);
    }
}
