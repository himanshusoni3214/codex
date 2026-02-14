<?php

namespace Tests\Feature;

use Tests\TestCase;

class CanonicalUrlMiddlewareTest extends TestCase
{
    public function test_trailing_slash_and_host_are_redirected_to_canonical_url(): void
    {
        config([
            'seo.redirect.enabled' => true,
            'seo.redirect.force_https' => false,
            'seo.redirect.canonical_host' => 'naturalgemstore.com',
            'seo.redirect.strip_trailing_slash' => true,
        ]);

        $response = $this
            ->withServerVariables(['HTTP_HOST' => '127.0.0.1'])
            ->get('/gemstones/');

        $response->assertRedirect('http://naturalgemstore.com/gemstones');
    }
}
