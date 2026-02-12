@extends('layouts.app')

@section('content')
<section class="max-w-md mx-auto px-4 py-16">
    <div class="bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <h1 class="font-display text-3xl text-midnight-900">Create Account</h1>
        <form method="POST" action="{{ route('register.store') }}" class="mt-6 space-y-4">
            @csrf
            <x-form.input label="Name" name="name" />
            <x-form.input label="Email" name="email" type="email" placeholder="you@example.com" />
            <x-form.input label="Password" name="password" type="password" />
            <x-form.input label="Confirm Password" name="password_confirmation" type="password" />
            <x-button type="submit">Register</x-button>
        </form>
    </div>
</section>
@endsection
