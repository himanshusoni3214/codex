@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    eyebrow="Blog"
    :title="$page->hero_title ?: 'Gemstone Education Blog'"
    :subtitle="$page->hero_subtitle ?: 'Canada-first gemstone guides and updates.'"
/>

<section class="max-w-6xl mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
            <article class="bg-white border border-platinum rounded-3xl p-6 shadow-lux">
                <p class="text-xs uppercase tracking-[0.2em] text-midnight-500">Blog</p>
                <h2 class="font-display text-2xl text-midnight-900 mt-2">{{ $post->title }}</h2>
                <p class="text-sm text-midnight-600 mt-3">{{ $post->excerpt ?: 'Editorial draft in progress.' }}</p>
                <div class="mt-4">
                    <x-button href="{{ route('blog.show', ['slug' => $post->slug]) }}" variant="outline">Read article</x-button>
                </div>
            </article>
        @empty
            <div class="text-sm text-midnight-600">No blog posts published yet.</div>
        @endforelse
    </div>

    @if($posts->hasPages())
        <div class="mt-8">{{ $posts->links() }}</div>
    @endif
</section>
@endsection
