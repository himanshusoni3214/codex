@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<section class="bg-gemstone-glow">
    <div class="max-w-4xl mx-auto px-4 py-16">
        <p class="text-sm uppercase tracking-[0.35em] text-emerald-700">Education</p>
        <h1 class="font-display text-4xl text-midnight-900 mt-3">GIA vs IGI</h1>
        <p class="text-lg text-midnight-600 mt-4">Both labs are respected. Understanding their focus helps you interpret reports confidently.</p>
    </div>
</section>

<section class="max-w-4xl mx-auto px-4 py-12 space-y-6 text-midnight-600">
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">GIA</h2>
        <p class="text-sm">Known for rigorous grading standards and global recognition. Commonly preferred for high-value gemstones and diamonds.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">IGI</h2>
        <p class="text-sm">Highly regarded for diamonds and colored stones, with strong international presence and consistent reporting.</p>
    </div>
    <div class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
        <h2 class="font-display text-2xl text-midnight-900">Our Approach</h2>
        <p class="text-sm">We accept both laboratories and provide report verification links whenever available.</p>
    </div>
</section>

<x-related-links context="education" title="Related guides" :data="['slug' => 'gia-vs-igi']" class="max-w-4xl mx-auto px-4 pb-14" />
@endsection
