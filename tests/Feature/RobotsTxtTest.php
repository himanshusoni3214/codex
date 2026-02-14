<?php

namespace Tests\Feature;

use Tests\TestCase;

class RobotsTxtTest extends TestCase
{
    public function test_robots_txt_contains_expected_directives(): void
    {
        config([
            'app.url' => 'https://naturalgemstore.com',
            'seo.site_url' => 'https://naturalgemstore.com',
        ]);

        $response = $this->get('/robots.txt');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $response->assertSee('Disallow: /admin', false);
        $response->assertSee('Disallow: /filament', false);
        $response->assertSee('Disallow: /register', false);
        $response->assertSee('Sitemap: https://naturalgemstore.com/sitemap.xml', false);
    }
}
