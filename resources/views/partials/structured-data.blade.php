@if(!empty($schemaOrganization))
<script type="application/ld+json">{!! json_encode($schemaOrganization, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif

@if(!empty($schemaWebsite))
<script type="application/ld+json">{!! json_encode($schemaWebsite, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif

@if(!empty($schemaLocalBusiness))
<script type="application/ld+json">{!! json_encode($schemaLocalBusiness, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif

@if(!empty($schemaBreadcrumbList))
<script type="application/ld+json">{!! json_encode($schemaBreadcrumbList, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif

@if(!empty($schemaProduct))
<script type="application/ld+json">{!! json_encode($schemaProduct, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif

@if(!empty($schemaFaqPage))
<script type="application/ld+json">{!! json_encode($schemaFaqPage, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif
