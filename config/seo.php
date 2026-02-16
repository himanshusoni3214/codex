<?php

return [
    'site_url' => rtrim(env('APP_URL', 'https://naturalgem.com'), '/'),
    'site_name' => env('SEO_SITE_NAME', env('APP_NAME', 'Natural Gem Store')),

    // Media Library ID preferred for OG fallback.
    'default_og_image_id' => env('SEO_DEFAULT_OG_IMAGE_ID'),
    // Can be a media-library ID (int-like string) or a path/URL.
    'default_og_image' => env('SEO_DEFAULT_OG_IMAGE_ID') ?: env('SEO_DEFAULT_OG_IMAGE', '/images/natural-gem-store-logo.svg'),
    'default_meta_description' => env(
        'SEO_DEFAULT_META_DESCRIPTION',
        'Shop certified natural gemstones in Canada with transparent CAD pricing, treatment disclosures, and documentation-first support.'
    ),

    'organization' => [
        'name' => env('SEO_ORGANIZATION_NAME', 'Natural Gem Store'),
        'address_line' => env('SEO_ADDRESS_LINE', 'Toronto'),
        'city' => env('SEO_CITY', 'Toronto'),
        'province' => env('SEO_PROVINCE', 'Ontario'),
        'postal_code' => env('SEO_POSTAL_CODE'),
        'country' => env('SEO_COUNTRY', 'CA'),
        'phone' => env('SEO_PHONE', '+1 (647) 555-0199'),
        'email' => env('SEO_EMAIL', 'hello@naturalgem.com'),
        'social_links' => array_values(array_filter(array_map('trim', explode(',', (string) env('SEO_SOCIAL_LINKS', ''))))),
    ],

    'pagination' => [
        'gemstones_per_page' => (int) env('SEO_GEMSTONES_PER_PAGE', 12),
    ],

    'redirect' => [
        'enabled' => filter_var(env('SEO_URL_REDIRECT_ENABLED', true), FILTER_VALIDATE_BOOL),
        'force_https' => filter_var(env('SEO_FORCE_HTTPS', false), FILTER_VALIDATE_BOOL),
        'canonical_host' => env('SEO_CANONICAL_HOST'),
        'strip_trailing_slash' => filter_var(env('SEO_STRIP_TRAILING_SLASH', true), FILTER_VALIDATE_BOOL),
    ],

    'query_indexing' => [
        'noindex_parameterized_pages' => filter_var(env('SEO_NOINDEX_PARAMETERIZED', true), FILTER_VALIDATE_BOOL),
        'allowed_parameters' => ['page'],
    ],

    'thin_content' => [
        'warning_product_threshold' => (int) env('SEO_THIN_WARNING_PRODUCTS', 3),
        'min_content_chars' => (int) env('SEO_THIN_MIN_CONTENT_CHARS', 500),
    ],
];
