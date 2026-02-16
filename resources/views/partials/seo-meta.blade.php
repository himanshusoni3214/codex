@php
    $seoMeta = $seoMeta ?? [];
@endphp

<title>{{ $seoMeta['title'] ?? 'Natural Gem Store Canada' }}</title>
<meta name="description" content="{{ $seoMeta['description'] ?? '' }}">
<meta name="robots" content="{{ $seoMeta['robots'] ?? 'index,follow' }}">
<link rel="canonical" href="{{ $seoMeta['canonical'] ?? app(\App\Services\SeoUrlService::class)->current(request()) }}">
@if(!empty($seoMeta['prev_url']))
    <link rel="prev" href="{{ $seoMeta['prev_url'] }}">
@endif
@if(!empty($seoMeta['next_url']))
    <link rel="next" href="{{ $seoMeta['next_url'] }}">
@endif

<meta property="og:type" content="{{ $seoMeta['og_type'] ?? 'website' }}">
<meta property="og:title" content="{{ $seoMeta['og_title'] ?? ($seoMeta['title'] ?? '') }}">
<meta property="og:description" content="{{ $seoMeta['og_description'] ?? ($seoMeta['description'] ?? '') }}">
<meta property="og:url" content="{{ $seoMeta['og_url'] ?? app(\App\Services\SeoUrlService::class)->current(request()) }}">
@if(!empty($seoMeta['og_image']))
    <meta property="og:image" content="{{ $seoMeta['og_image'] }}">
@endif

<meta name="twitter:card" content="{{ $seoMeta['twitter_card'] ?? 'summary_large_image' }}">
<meta name="twitter:title" content="{{ $seoMeta['twitter_title'] ?? ($seoMeta['title'] ?? '') }}">
<meta name="twitter:description" content="{{ $seoMeta['twitter_description'] ?? ($seoMeta['description'] ?? '') }}">
@if(!empty($seoMeta['twitter_image']))
    <meta name="twitter:image" content="{{ $seoMeta['twitter_image'] }}">
@endif
