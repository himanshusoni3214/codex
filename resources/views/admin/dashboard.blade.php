@extends('layouts.app')

@section('content')
@include('partials.admin-nav')

<section class="max-w-6xl mx-auto px-4 py-12">
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h1 class="font-display text-3xl text-midnight-900">Admin Dashboard</h1>
        <p class="text-midnight-600 mt-3">Manage gemstones, testimonials, and site settings.</p>
        <div class="mt-6 grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="{{ route('admin.gemstones.index') }}" class="bg-ivory rounded-2xl p-4">Manage Gemstones</a>
            <a href="{{ route('admin.testimonials.index') }}" class="bg-ivory rounded-2xl p-4">Manage Testimonials</a>
            <a href="{{ route('admin.pages.index') }}" class="bg-ivory rounded-2xl p-4">Edit Page Meta</a>
            <a href="{{ route('admin.settings.edit') }}" class="bg-ivory rounded-2xl p-4">Site Settings</a>
        </div>
    </div>
</section>
@endsection
