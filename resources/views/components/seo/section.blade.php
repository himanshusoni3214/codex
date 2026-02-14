@props([
    'title' => '',
    'content' => '',
])

<section class="bg-white rounded-3xl p-6 shadow-lux border border-platinum">
    <h2 class="font-display text-2xl text-midnight-900">{{ $title }}</h2>
    <div class="text-midnight-600 mt-3 leading-relaxed prose prose-sm max-w-none prose-headings:font-display prose-headings:text-midnight-900 prose-p:text-midnight-600">
        {!! $content !!}
    </div>
</section>

