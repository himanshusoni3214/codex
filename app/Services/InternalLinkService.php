<?php

namespace App\Services;

use App\Models\GemstoneType;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class InternalLinkService
{
    private ?Collection $existingTypeSlugs = null;

    public function for(string $context, array $data = [], int $max = 4): array
    {
        $maxLinks = max(1, min($max, (int) config('internal_links.max_links', 4)));

        $links = match ($context) {
            'product' => $this->forProduct($data),
            'gemstone_type', 'origin' => $this->forGemstoneType($data),
            'astrology' => $this->forAstrology($data),
            'education' => $this->forMappedSet(config('internal_links.education_related', []), (string) ($data['slug'] ?? 'default')),
            'certification' => $this->forMappedSet(config('internal_links.certification_related', []), (string) ($data['slug'] ?? 'default')),
            'engagement' => $this->forMappedSet(config('internal_links.engagement_related', []), (string) ($data['slug'] ?? 'default')),
            'local' => $this->forMappedEntries(config('internal_links.local_related', [])),
            default => [
                $this->defaultLink('certification_hub'),
                $this->defaultLink('education_hub'),
                $this->defaultLink('toronto_store'),
                $this->defaultLink('consultation'),
            ],
        };

        return collect($links)
            ->filter(fn ($item) => is_array($item) && filled($item['label'] ?? null) && filled($item['url'] ?? null))
            ->unique('url')
            ->take($maxLinks)
            ->values()
            ->all();
    }

    private function forProduct(array $data): array
    {
        $typeSlug = $this->resolveTypeSlug($data);

        return [
            $this->defaultLink('certification_hub'),
            $this->astrologyLinkForType($typeSlug),
            $this->defaultLink('toronto_store'),
            $this->defaultLink('purchase_request'),
        ];
    }

    private function forGemstoneType(array $data): array
    {
        $typeSlug = $this->resolveTypeSlug($data);

        $links = [
            $this->astrologyLinkForType($typeSlug),
            $this->defaultLink('certification_hub'),
            $this->defaultLink('toronto_store'),
        ];

        if ($typeSlug && in_array($typeSlug, config('internal_links.engagement_types', []), true)) {
            $links[] = $this->defaultLink('engagement_hub');
        } else {
            $links[] = $this->defaultLink('consultation');
        }

        return $links;
    }

    private function forAstrology(array $data): array
    {
        $slug = Str::slug((string) ($data['slug'] ?? ''));
        $mapped = config("internal_links.astrology_to_gemstone.{$slug}", []);
        $typeSlug = $mapped['type_slug'] ?? $this->resolveTypeSlug($data);

        return [
            $this->gemstoneTypeLink($typeSlug, $mapped['label'] ?? null),
            $this->defaultLink('certification_hub'),
            $this->defaultLink('consultation'),
            $this->defaultLink('purchase_request'),
        ];
    }

    private function forMappedSet(array $map, string $slug): array
    {
        $entries = Arr::get($map, Str::slug($slug), Arr::get($map, 'default', []));

        return $this->forMappedEntries($entries);
    }

    private function forMappedEntries(array $entries): array
    {
        return collect($entries)
            ->map(fn ($entry) => $this->resolveMappedEntry($entry))
            ->all();
    }

    private function resolveMappedEntry(array $entry): ?array
    {
        $type = (string) ($entry['type'] ?? '');

        return match ($type) {
            'hub' => $this->defaultLink((string) ($entry['key'] ?? ''), $entry['label'] ?? null),
            'gemstone' => $this->gemstoneTypeLink((string) ($entry['slug'] ?? ''), $entry['label'] ?? null),
            'astrology' => $this->astrologyLink((string) ($entry['slug'] ?? ''), $entry['label'] ?? null),
            'education' => $this->educationLink((string) ($entry['slug'] ?? ''), $entry['label'] ?? null),
            'certification' => $this->certificationLink((string) ($entry['slug'] ?? ''), $entry['label'] ?? null),
            'engagement' => $this->engagementLink((string) ($entry['slug'] ?? ''), $entry['label'] ?? null),
            default => null,
        };
    }

    private function defaultLink(string $key, ?string $label = null): ?array
    {
        if ($key === '') {
            return null;
        }

        $defaults = config("internal_links.defaults.{$key}");
        if (! is_array($defaults)) {
            return null;
        }

        $url = $this->resolveRoute($defaults['route'] ?? null, (array) ($defaults['params'] ?? []));
        if (! $url) {
            return null;
        }

        return [
            'label' => $label ?: (string) ($defaults['label'] ?? ''),
            'url' => $url,
        ];
    }

    private function gemstoneTypeLink(?string $typeSlug, ?string $label = null): ?array
    {
        $typeSlug = Str::slug((string) $typeSlug);
        if ($typeSlug === '') {
            return null;
        }

        if (! $this->typeSlugExists($typeSlug)) {
            return null;
        }

        return [
            'label' => $label ?: (string) (config("internal_links.gemstone_labels.{$typeSlug}")
                ?: 'Certified ' . Str::headline($typeSlug) . ' in Canada'),
            'url' => route('gemstones.show', ['slug' => $typeSlug]),
        ];
    }

    private function astrologyLinkForType(?string $typeSlug): ?array
    {
        $typeSlug = Str::slug((string) $typeSlug);
        if ($typeSlug === '') {
            return null;
        }

        $entry = config("internal_links.gemstone_to_astrology.{$typeSlug}");
        if (! is_array($entry) || empty($entry['slug'])) {
            return null;
        }

        return $this->astrologyLink((string) $entry['slug'], $entry['label'] ?? null);
    }

    private function astrologyLink(string $slug, ?string $label = null): ?array
    {
        $slug = Str::slug($slug);
        if ($slug === '') {
            return null;
        }

        return [
            'label' => $label ?: Str::headline(str_replace('-', ' ', $slug)) . ' guide',
            'url' => route('astrology.show', ['slug' => $slug]),
        ];
    }

    private function educationLink(string $slug, ?string $label = null): ?array
    {
        $slug = Str::slug($slug);
        if ($slug === '') {
            return null;
        }

        $staticMap = [
            'certification' => ['route' => 'education.certification', 'label' => 'Gemstone certification explained'],
            'gia-vs-igi' => ['route' => 'education.gia-vs-igi', 'label' => 'GIA vs IGI certification guide'],
            'natural-vs-treated' => ['route' => 'education.natural-vs-treated', 'label' => 'Natural vs treated gemstones'],
            'birthstones-vs-astrology' => ['route' => 'education.birthstones-vs-astrology', 'label' => 'Birthstones vs astrology stones'],
            'buying-gemstones-canada' => ['route' => 'education.buying-in-canada', 'label' => 'Buying gemstones in Canada guide'],
        ];

        if (isset($staticMap[$slug])) {
            return [
                'label' => $label ?: $staticMap[$slug]['label'],
                'url' => route($staticMap[$slug]['route']),
            ];
        }

        return [
            'label' => $label ?: Str::headline(str_replace('-', ' ', $slug)),
            'url' => route('education.show', ['slug' => $slug]),
        ];
    }

    private function certificationLink(string $slug, ?string $label = null): ?array
    {
        $slug = Str::slug($slug);
        if ($slug === '') {
            return null;
        }

        return [
            'label' => $label ?: Str::headline(str_replace('-', ' ', $slug)),
            'url' => route('certification.show', ['slug' => $slug]),
        ];
    }

    private function engagementLink(string $slug, ?string $label = null): ?array
    {
        $slug = Str::slug($slug);
        if ($slug === '') {
            return null;
        }

        return [
            'label' => $label ?: Str::headline(str_replace('-', ' ', $slug)),
            'url' => route('engagement.show', ['slug' => $slug]),
        ];
    }

    private function resolveRoute(?string $route, array $params = []): ?string
    {
        if (! $route || ! app('router')->has($route)) {
            return null;
        }

        return route($route, $params);
    }

    private function resolveTypeSlug(array $data): ?string
    {
        if (! empty($data['type_slug'])) {
            return Str::slug((string) $data['type_slug']);
        }

        if (! empty($data['gem_type'])) {
            return Str::slug((string) $data['gem_type']);
        }

        return null;
    }

    private function typeSlugExists(string $typeSlug): bool
    {
        if ($this->existingTypeSlugs === null) {
            if (! Schema::hasTable('gemstone_types')) {
                $this->existingTypeSlugs = collect();
            } else {
                $query = GemstoneType::query();
                if (Schema::hasColumn('gemstone_types', 'is_indexable')) {
                    $query->where('is_indexable', true);
                }

                $this->existingTypeSlugs = $query
                    ->pluck('slug')
                    ->map(fn (string $slug) => Str::slug($slug));
            }
        }

        if ($this->existingTypeSlugs->isEmpty()) {
            return false;
        }

        return $this->existingTypeSlugs->contains($typeSlug);
    }
}
