@extends('layouts.app')

@php
    $isIndexable = false;
    $page = (object) [
        'title' => 'Admin Login',
        'meta_title' => 'Admin Login | Natural Gem Store',
        'meta_description' => 'Secure admin login for Natural Gem Store staff.',
    ];
@endphp

@section('content')
<section class="max-w-md mx-auto px-4 py-16">
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h1 class="font-display text-3xl text-midnight-900">Admin Login</h1>
        <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-4">
            @csrf
            <x-form.input label="Email" name="email" type="email" placeholder="you@example.com" />
            <x-form.input label="Password" name="password" type="password" />
            <div class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" class="h-4 w-4">
                <label>Remember me</label>
            </div>
            <x-button type="submit">Login</x-button>
        </form>
    </div>
</section>
@endsection
