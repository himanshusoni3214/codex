@php
    $structuredData = $structuredData ?? [];
@endphp

@foreach($structuredData as $schema)
    @if(is_array($schema) && $schema !== [])
        <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @endif
@endforeach

