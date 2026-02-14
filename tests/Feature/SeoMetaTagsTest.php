<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoMetaTagsTest extends TestCase
{
    use RefreshDatabase;

    public function test_parameterized_listing_pages_are_noindex_with_clean_canonical(): void
    {
        config([
            'app.url' => 'https://naturalgemstore.com',
            'seo.site_url' => 'https://naturalgemstore.com',
            'seo.query_indexing.noindex_parameterized_pages' => true,
        ]);

        $response = $this->get('/gemstones?sort=price');

        $response->assertOk();
        $response->assertSee('name="robots" content="noindex,follow"', false);
        $response->assertSee('rel="canonical" href="https://naturalgemstore.com/gemstones"', false);
    }
}
