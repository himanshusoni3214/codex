<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoSiloExpansionTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_silo_and_blog_routes_render(): void
    {
        $this->seedCorePages();

        $this->get('/astrology')->assertOk();
        $this->get('/astrology/blue-sapphire-neelam')->assertOk();
        $this->get('/certification')->assertOk();
        $this->get('/certification/verify-gemstone-certificate')->assertOk();
        $this->get('/engagement-rings')->assertOk();
        $this->get('/engagement-rings/sapphire-engagement-ring-toronto')->assertOk();
        $this->get('/gta/scarborough-gemstone-store')
            ->assertOk()
            ->assertSee('"@type":"JewelryStore"', false);
        $this->get('/blog')->assertOk();
        $this->get('/blog/sample-blog-post')->assertOk();
    }

    public function test_sitemap_includes_new_silo_urls(): void
    {
        config([
            'app.url' => 'https://naturalgemstore.com',
            'seo.site_url' => 'https://naturalgemstore.com',
        ]);

        $this->seedCorePages();

        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertSee('https://naturalgemstore.com/astrology', false);
        $response->assertSee('https://naturalgemstore.com/astrology/blue-sapphire-neelam', false);
        $response->assertSee('https://naturalgemstore.com/certification', false);
        $response->assertSee('https://naturalgemstore.com/certification/verify-gemstone-certificate', false);
        $response->assertSee('https://naturalgemstore.com/engagement-rings', false);
        $response->assertSee('https://naturalgemstore.com/engagement-rings/sapphire-engagement-ring-toronto', false);
        $response->assertSee('https://naturalgemstore.com/gta/scarborough-gemstone-store', false);
        $response->assertSee('https://naturalgemstore.com/blog', false);
        $response->assertSee('https://naturalgemstore.com/blog/sample-blog-post', false);
    }

    private function seedCorePages(): void
    {
        Page::create([
            'slug' => 'astrology',
            'section' => 'astrology_hub',
            'title' => 'Astrology Hub',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        Page::create([
            'slug' => 'blue-sapphire-neelam',
            'section' => 'astrology',
            'title' => 'Blue Sapphire',
            'content' => '<h2>Overview</h2><p>Traditional context.</p>',
            'faq_items' => [
                ['question' => 'Q1', 'answer' => 'A1'],
            ],
            'status' => 'published',
            'is_indexable' => true,
        ]);

        Page::create([
            'slug' => 'certification',
            'section' => 'certification_hub',
            'title' => 'Certification Hub',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        Page::create([
            'slug' => 'verify-gemstone-certificate',
            'section' => 'certification',
            'title' => 'Verify Gemstone Certificate',
            'content' => '<h2>Steps</h2><p>Check report ID.</p>',
            'faq_items' => [
                ['question' => 'Q1', 'answer' => 'A1'],
            ],
            'status' => 'published',
            'is_indexable' => true,
        ]);

        Page::create([
            'slug' => 'engagement-rings',
            'section' => 'engagement_hub',
            'title' => 'Engagement Hub',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        Page::create([
            'slug' => 'sapphire-engagement-ring-toronto',
            'section' => 'engagement',
            'title' => 'Sapphire Engagement Ring Toronto',
            'content' => '<h2>Process</h2><p>Timeline details.</p>',
            'faq_items' => [
                ['question' => 'Q1', 'answer' => 'A1'],
            ],
            'status' => 'published',
            'is_indexable' => true,
        ]);

        Page::create([
            'slug' => 'scarborough-gemstone-store',
            'section' => 'gta',
            'title' => 'Scarborough Gemstone Store',
            'content' => '<h2>Local service</h2><p>Coverage details.</p>',
            'status' => 'published',
            'is_indexable' => true,
        ]);

        Page::create([
            'slug' => 'sample-blog-post',
            'section' => 'blog',
            'title' => 'Sample Blog Post',
            'content' => '<h2>Intro</h2><p>Sample blog content.</p>',
            'status' => 'published',
            'is_indexable' => true,
        ]);
    }
}
