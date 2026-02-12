@extends('layouts.app')

@section('content')
@include('partials.admin-nav')

<section class="max-w-6xl mx-auto px-4 py-12">
    <div class="flex items-center justify-between">
        <h1 class="font-display text-3xl text-midnight-900">Testimonials</h1>
        <x-button href="{{ route('admin.testimonials.create') }}">Add Testimonial</x-button>
    </div>

    @if(session('status'))
        <div class="mt-4 text-sm text-emerald-700">{{ session('status') }}</div>
    @endif

    <div class="mt-6 bg-white rounded-3xl shadow-lux border border-platinum overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-ivory text-midnight-900">
                <tr>
                    <th class="text-left p-4">Name</th>
                    <th class="text-left p-4">Rating</th>
                    <th class="text-left p-4">Featured</th>
                    <th class="text-right p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr class="border-t">
                        <td class="p-4">{{ $testimonial->name }}</td>
                        <td class="p-4">{{ $testimonial->rating }}</td>
                        <td class="p-4">{{ $testimonial->is_featured ? 'Yes' : 'No' }}</td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-emerald-700">Edit</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-emerald-700" onclick="return confirm('Delete this testimonial?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
