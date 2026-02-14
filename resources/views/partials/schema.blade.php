@php
    $schemaItems = $schemaItems ?? [];
@endphp

@foreach($schemaItems as $schemaItem)
    <script type="application/ld+json">{!! json_encode($schemaItem, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endforeach

