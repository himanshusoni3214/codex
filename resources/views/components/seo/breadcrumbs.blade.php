@props([
    'items' => [],
])

@if(!empty($items))
    <nav class="max-w-6xl mx-auto px-4 py-4 text-sm text-midnight-500" aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-2">
            @foreach($items as $index => $item)
                @if($index > 0)
                    <li aria-hidden="true">/</li>
                @endif
                <li>
                    @if($index < count($items) - 1 && !empty($item['url']))
                        <a href="{{ $item['url'] }}" class="hover:text-emerald-700">{{ $item['label'] }}</a>
                    @else
                        <span class="text-midnight-700">{{ $item['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif

