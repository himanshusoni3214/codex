<?php

namespace Tests\Feature;

use App\Models\GemstonePiece;
use App\Models\GemstoneType;
use App\Models\Origin;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitemapSeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_includes_product_and_silo_urls(): void
    {
        $this->app['env'] = 'production';

        config([
            'app.url' => 'https://naturalgemstore.com',
            'seo.site_url' => 'https://naturalgemstore.com',
        ]);

        $type = GemstoneType::create([
            'name' => 'Ruby',
            'slug' => 'ruby',
            'is_indexable' => true,
        ]);

        $origin = Origin::create([
            'name' => 'Burma',
            'slug' => 'burma',
            'is_indexable' => true,
        ]);

        $product = Product::create([
            'title' => 'Burma Ruby 1108',
            'slug' => 'burma-ruby-1108',
            'sku' => '1108',
            'status' => 'active',
            'product_type' => 'gemstone',
            'short_description' => 'Certified ruby inventory item.',
        ]);

        Product::create([
            'title' => 'Hidden Ruby 9999',
            'slug' => 'hidden-ruby-9999',
            'sku' => '9999',
            'status' => 'active',
            'product_type' => 'gemstone',
            'short_description' => 'No sellable inventory, should be excluded.',
        ]);

        $product->gemstoneTypes()->attach($type->id);
        $product->origins()->attach($origin->id);

        GemstonePiece::create([
            'product_id' => $product->id,
            'piece_code' => '1108-1',
            'weight_ct' => 1.00,
            'status' => 'available',
        ]);

        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
        $response->assertSee('https://naturalgemstore.com/gemstones/ruby/burma-ruby-1108', false);
        $response->assertSee('https://naturalgemstore.com/gemstones/ruby', false);
        $response->assertSee('https://naturalgemstore.com/gemstones/ruby/burma', false);
        $response->assertDontSee('https://naturalgemstore.com/gemstones/hidden-ruby-9999', false);

        $xml = simplexml_load_string($response->getContent());
        $this->assertNotFalse($xml);
        $xml->registerXPathNamespace('sm', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        $productNodes = $xml->xpath("//sm:url[sm:loc='https://naturalgemstore.com/gemstones/ruby/burma-ruby-1108']");
        $this->assertNotFalse($productNodes);
        $this->assertCount(1, $productNodes);
        $this->assertSame('weekly', (string) $productNodes[0]->changefreq);
        $this->assertSame('0.8', (string) $productNodes[0]->priority);
    }

    public function test_sitemap_excludes_product_urls_in_non_production_environment(): void
    {
        $this->app['env'] = 'local';

        config([
            'app.url' => 'https://naturalgemstore.com',
            'seo.site_url' => 'https://naturalgemstore.com',
        ]);

        $type = GemstoneType::create([
            'name' => 'Sapphire',
            'slug' => 'sapphire',
            'is_indexable' => true,
        ]);

        $product = Product::create([
            'title' => 'BKK Big Blue Sapphire 101',
            'slug' => 'bkk-big-blue-sapphire-101',
            'sku' => '101',
            'status' => 'active',
            'product_type' => 'gemstone',
            'short_description' => 'Certified sapphire inventory item.',
        ]);

        $product->gemstoneTypes()->attach($type->id);

        GemstonePiece::create([
            'product_id' => $product->id,
            'piece_code' => '101-1',
            'weight_ct' => 12.50,
            'status' => 'available',
        ]);

        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertDontSee('https://naturalgemstore.com/gemstones/sapphire/bkk-big-blue-sapphire-101', false);
    }
}
