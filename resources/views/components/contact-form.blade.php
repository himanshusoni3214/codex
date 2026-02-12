@props([
    'action' => route('contact.store'),
    'submitLabel' => 'Send Message'
])

<form method="POST" action="{{ $action }}" class="space-y-4">
    @csrf
    <div class="grid md:grid-cols-2 gap-4">
        <x-form.input label="Full Name" name="name" placeholder="Your name" />
        <x-form.input label="Email" name="email" type="email" placeholder="you@example.com" />
    </div>
    <x-form.input label="Phone (optional)" name="phone" placeholder="+1" />
    <x-form.textarea label="How can we help?" name="message" rows="5" placeholder="Tell us about the gemstone or service you need" />

    <div class="flex items-center gap-3 flex-wrap">
        <x-button type="submit">{{ $submitLabel }}</x-button>
        @if(session('status'))
            <span class="text-sm text-emerald-700">{{ session('status') }}</span>
        @endif
        <span class="text-xs text-midnight-500">No guarantees or outcomes are implied.</span>
    </div>
</form>
