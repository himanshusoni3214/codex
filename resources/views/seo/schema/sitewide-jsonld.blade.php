@php
    $schemaOrganization = $schemaOrganization ?? null;
    $schemaWebsite = $schemaWebsite ?? null;
    $schemaLocalBusiness = $schemaLocalBusiness ?? null;
@endphp

@if(!empty($schemaOrganization))
<script type="application/ld+json">{!! \App\SEO\Schema\JsonLd::encode($schemaOrganization) !!}</script>
@endif

@if(!empty($schemaWebsite))
<script type="application/ld+json">{!! \App\SEO\Schema\JsonLd::encode($schemaWebsite) !!}</script>
@endif

@if(!empty($schemaLocalBusiness))
<script type="application/ld+json">{!! \App\SEO\Schema\JsonLd::encode($schemaLocalBusiness) !!}</script>
@endif
