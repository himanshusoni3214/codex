@extends('layouts.app')

@section('content')
@include('partials.admin-nav')

<section class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="font-display text-3xl text-midnight-900">Page Meta</h1>

    @if(session('status'))
        <div class="mt-4 text-sm text-emerald-700">{{ session('status') }}</div>
    @endif

    <div class="mt-6 bg-white rounded-3xl shadow-lux border border-platinum overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-ivory text-midnight-900">
                <tr>
                    <th class="text-left p-4">Title</th>
                    <th class="text-left p-4">Slug</th>
                    <th class="text-right p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr class="border-t">
                        <td class="p-4">{{ $page->title }}</td>
                        <td class="p-4 text-midnight-600">{{ $page->slug }}</td>
                        <td class="p-4 text-right">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="text-emerald-700">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
