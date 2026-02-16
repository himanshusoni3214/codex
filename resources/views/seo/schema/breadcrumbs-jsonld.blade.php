@php
    $schema = $schema ?? null;
@endphp

@if(!empty($schema))
<script type="application/ld+json">{!! \App\SEO\Schema\JsonLd::encode($schema) !!}</script>
@endif

