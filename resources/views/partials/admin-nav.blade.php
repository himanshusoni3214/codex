<nav class="bg-midnight-900 text-white">
    <div class="max-w-6xl mx-auto px-4 py-3 flex flex-wrap gap-4 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-gold-200">Dashboard</a>
        <a href="{{ route('admin.gemstones.index') }}" class="hover:text-gold-200">Gemstones</a>
        <a href="{{ route('admin.testimonials.index') }}" class="hover:text-gold-200">Testimonials</a>
        <a href="{{ route('admin.pages.index') }}" class="hover:text-gold-200">Page Meta</a>
        <a href="{{ route('admin.settings.edit') }}" class="hover:text-gold-200">Settings</a>
        <form method="POST" action="{{ route('logout') }}" class="ml-auto">
            @csrf
            <button type="submit" class="hover:text-gold-200">Logout</button>
        </form>
    </div>
</nav>
