@extends('layouts.app')

@section('content')
<x-seo.breadcrumbs :items="$breadcrumbs ?? []" />

<x-seo.hero
    eyebrow="Education"
    :title="$page->hero_title ?: $page->title"
    :subtitle="$page->hero_subtitle ?: ($page->excerpt ?: 'Practical gemstone education for informed Canadian buyers.')"
/>

<section class="max-w-4xl mx-auto px-4 py-12 space-y-6">
    <x-seo.section
        :title="$page->title"
        :content="$page->content ?: 'Content will be available soon.'"
    />

    <x-seo.faq :items="$page->faq_items ?? []" />

    <x-related-links
        context="education"
        title="Related guides"
        :data="['slug' => $page->slug]"
    />
</section>
@endsection
