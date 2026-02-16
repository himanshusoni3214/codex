<?php

namespace Tests\Feature;

use App\Models\GemstonePiece;
use App\Models\GemstoneType;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StructuredDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_page_contains_product_breadcrumb_and_faq_json_ld(): void
    {
        config([
            'app.url' => 'https://naturalgem.com',
            'seo.site_url' => 'https://naturalgem.com',
        ]);

        $type = GemstoneType::create([
            'name' => 'Sapphire',
            'slug' => 'sapphire',
            'is_indexable' => true,
        ]);

        $product = Product::create([
            'title' => 'BKK Big Blue Sapphire 101',
            'slug' => 'bkk-big-blue-sapphire-101',
            'product_type' => 'gemstone',
            'status' => 'active',
            'sku' => '101',
            'gem_type' => 'Sapphire',
            'short_description' => 'Certified sapphire with transparent disclosure.',
            'price_cad' => 4500,
            'weight_per_piece' => 12.50,
        ]);
        $product->gemstoneTypes()->attach($type->id);

        GemstonePiece::create([
            'product_id' => $product->id,
            'piece_code' => '101-1',
            'weight_ct' => 12.50,
            'status' => 'available',
        ]);

        $response = $this->get('/gemstones/sapphire/bkk-big-blue-sapphire-101');

        $response->assertOk();
        $response->assertSee('application/ld+json', false);
        $response->assertSee('"@type":"Product"', false);
        $response->assertSee('"@type":"BreadcrumbList"', false);
        $response->assertSee('"@type":"FAQPage"', false);
        $response->assertSee('"priceCurrency":"CAD"', false);
        $response->assertSee('"category":"Sapphire"', false);
        $response->assertSee('"itemCondition":"https://schema.org/NewCondition"', false);
        $response->assertDontSee('"@type":"AggregateRating"', false);
    }

    public function test_contact_page_contains_local_business_but_no_breadcrumb_schema(): void
    {
        config([
            'app.url' => 'https://naturalgem.com',
            'seo.site_url' => 'https://naturalgem.com',
        ]);

        $response = $this->get('/contact');

        $response->assertOk();
        $response->assertSee('"@type":"Organization"', false);
        $response->assertSee('"@type":"JewelryStore"', false);
        $response->assertDontSee('"@type":"BreadcrumbList"', false);
    }

    public function test_faq_page_contains_faqpage_json_ld_only_when_visible_faq_exists(): void
    {
        config([
            'app.url' => 'https://naturalgem.com',
            'seo.site_url' => 'https://naturalgem.com',
        ]);

        $response = $this->get('/faq');

        $response->assertOk();
        $response->assertSee('"@type":"FAQPage"', false);
        $response->assertSee('Do you provide certification?', false);
        $response->assertDontSee('"@type":"JewelryStore"', false);
    }

    public function test_non_local_pages_do_not_render_local_business_schema(): void
    {
        config([
            'app.url' => 'https://naturalgem.com',
            'seo.site_url' => 'https://naturalgem.com',
        ]);

        $response = $this->get('/about');

        $response->assertOk();
        $response->assertSee('"@type":"Organization"', false);
        $response->assertSee('"@type":"WebSite"', false);
        $response->assertDontSee('"@type":"JewelryStore"', false);
    }
}
