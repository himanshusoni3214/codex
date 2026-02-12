@extends('layouts.app')

@section('content')
@include('partials.admin-nav')

<section class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="font-display text-3xl text-midnight-900">Edit Gemstone</h1>
    <div class="mt-6 bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        @include('admin.gemstones._form', ['gemstone' => $gemstone])
    </div>
</section>
@endsection
