@extends('layouts.app')

@section('content')
@include('partials.admin-nav')

<section class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="font-display text-3xl text-midnight-900">Site Settings</h1>

    @if(session('status'))
        <div class="mt-4 text-sm text-emerald-700">{{ session('status') }}</div>
    @endif

    <div class="mt-6 bg-white rounded-3xl p-8 shadow-lux border border-platinum">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-4">
            @csrf
            @method('PUT')
            <x-form.input label="Site Name" name="site_name" :value="$settings['site_name'] ?? ''" />
            <x-form.input label="Logo Path" name="logo_path" :value="$settings['logo_path'] ?? ''" />
            <x-form.input label="Contact Phone" name="contact_phone" :value="$settings['contact_phone'] ?? ''" />
            <x-form.input label="Contact Email" name="contact_email" type="email" :value="$settings['contact_email'] ?? ''" />
            <x-form.input label="Contact Address" name="contact_address" :value="$settings['contact_address'] ?? ''" />
            <x-form.input label="WhatsApp" name="whatsapp" :value="$settings['whatsapp'] ?? ''" />
            <x-form.input label="CTA Text" name="cta_text" :value="$settings['cta_text'] ?? ''" />
            <x-form.input label="Currency" name="currency" :value="$settings['currency'] ?? 'CAD'" />
            <x-form.input label="Tax Note" name="tax_note" :value="$settings['tax_note'] ?? ''" />
            <x-button type="submit">Save Settings</x-button>
        </form>
    </div>
</section>
@endsection
