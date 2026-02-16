@php
    $schemaOrganization = $schemaOrganization ?? null;
    $schemaLocalBusiness = $schemaLocalBusiness ?? null;
@endphp

@if(!empty($schemaOrganization))
<script type="application/ld+json">{!! \App\SEO\Schema\JsonLd::encode($schemaOrganization) !!}</script>
@endif

@if(!empty($schemaLocalBusiness))
<script type="application/ld+json">{!! \App\SEO\Schema\JsonLd::encode($schemaLocalBusiness) !!}</script>
@endif

