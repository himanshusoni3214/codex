@extends('layouts.app')

@section('content')
@include('partials.admin-nav')

<section class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="font-display text-3xl text-midnight-900">Edit Page Meta</h1>

    <div class="mt-6 bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <form method="POST" action="{{ route('admin.pages.update', $page) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <x-form.input label="Title" name="title" :value="$page->title" />
            <x-form.input label="Meta Title" name="meta_title" :value="$page->meta_title" />
            <x-form.input label="Meta Description" name="meta_description" :value="$page->meta_description" />
            <x-form.textarea label="Content" name="content" rows="6" :value="$page->content" />
            <x-button type="submit">Save</x-button>
        </form>
    </div>
</section>
@endsection
