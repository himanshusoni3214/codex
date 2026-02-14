<?php

return [
    'dsn' => env('SENTRY_LARAVEL_DSN', env('SENTRY_DSN')),
    'environment' => env('APP_ENV', 'production'),
    'breadcrumbs' => [
        'sql_bindings' => true,
        'sql_queries' => true,
        'sql_queries_bindings' => true,
        'logs' => true,
        'cache' => true,
        'livewire' => true,
        'requests' => true,
        'console' => true,
        'jobs' => true,
        'notifications' => true,
    ],
    'traces_sample_rate' => (float) env('SENTRY_TRACES_SAMPLE_RATE', 0.1),
    'profiles_sample_rate' => (float) env('SENTRY_PROFILES_SAMPLE_RATE', 0.1),
    'send_default_pii' => false,
];
