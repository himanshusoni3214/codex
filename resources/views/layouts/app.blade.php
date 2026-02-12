<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $page = $page ?? null;
        $gemstone = $gemstone ?? null;

        $metaTitle = optional($page)->meta_title
            ?? optional($page)->title
            ?? optional($gemstone)->meta_title
            ?? optional($gemstone)->title
            ?? ($settings['site_name'] ?? 'Natural Gem');

        $metaDescription = optional($page)->meta_description
            ?? optional($gemstone)->meta_description
            ?? optional($gemstone)->short_description
            ?? 'Certified natural gemstones with transparent sourcing and documentation.';
    @endphp
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/images/natural-gem-logo.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
