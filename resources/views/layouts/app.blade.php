<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $page = $page ?? null;
        $gemstone = $gemstone ?? null;
        $type = $type ?? null;
        $origin = $origin ?? null;
        $resolvedPaginator = $paginator ?? null;
        if (!$resolvedPaginator && isset($gemstones) && $gemstones instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator) {
            $resolvedPaginator = $gemstones;
        }
        $seoMeta = $seoMeta ?? app(\App\Services\SeoMetaService::class)->resolve([
            'page' => $page,
            'gemstone' => $gemstone,
            'type' => $type,
            'origin' => $origin,
            'settings' => $settings ?? [],
            'canonical' => $canonical ?? null,
            'paginator' => $resolvedPaginator,
            'force_noindex' => $forceNoindex ?? false,
            'indexable' => $isIndexable ?? null,
        ]);

        // Sitewide JSON-LD: Organization + LocalBusiness (Toronto).
        // Page-specific schemas (Product / BreadcrumbList / FAQPage) are pushed by the views/components
        // to ensure the markup exactly matches visible content.
        $schemaOrganization = app(\App\SEO\Schema\OrganizationSchema::class)->build($settings ?? []);
        $schemaLocalBusiness = app(\App\SEO\Schema\LocalBusinessSchema::class)->build($settings ?? []);
    @endphp
    @include('seo.schema.sitewide-jsonld', [
        'schemaOrganization' => $schemaOrganization,
        'schemaLocalBusiness' => $schemaLocalBusiness,
    ])
    @stack('schema')
    @include('partials.seo-meta', ['seoMeta' => $seoMeta])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/images/natural-gem-logo.svg" type="image/svg+xml">
    <link rel="dns-prefetch" href="//static.cloudflareinsights.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @stack('preload')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-body text-graphite bg-ivory">
    <x-header />

    <main class="min-h-screen">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
