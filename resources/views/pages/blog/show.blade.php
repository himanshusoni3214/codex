@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    eyebrow="Blog"
    :title="$post->hero_title ?: $post->title"
    :subtitle="$post->hero_subtitle ?: ($post->excerpt ?: 'Gemstone education article for Canadian buyers.')"
/>

<section class="max-w-6xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-6">
    <article class="lg:col-span-2 bg-white rounded-3xl p-6 border border-platinum shadow-lux">
        <div class="prose prose-sm max-w-none text-midnight-600 prose-headings:font-display prose-headings:text-midnight-900">
            {!! $post->content ?: '<p>Article content coming soon.</p>' !!}
        </div>
    </article>

    <aside class="space-y-6">
        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-xl text-midnight-900">Related Gemstones</h2>
            <div class="mt-4 flex flex-wrap gap-2 text-sm">
                @foreach($relatedTypes as $type)
                    <a href="{{ route('gemstones.show', ['slug' => $type->slug]) }}" class="bg-ivory border border-platinum rounded-full px-4 py-2 hover:border-emerald-500">
                        {{ $type->name }}
                    </a>
                @endforeach
            </div>
        </section>

        <section class="bg-white rounded-3xl p-6 border border-platinum shadow-lux">
            <h2 class="font-display text-xl text-midnight-900">Related Posts</h2>
            <div class="mt-4 space-y-2 text-sm">
                @foreach($relatedPosts as $related)
                    <a href="{{ route('blog.show', ['slug' => $related->slug]) }}" class="block underline text-midnight-600 hover:text-emerald-700">
                        {{ $related->title }}
                    </a>
                @endforeach
            </div>
        </section>
    </aside>
</section>
@endsection
