<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Services\SeoMetaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class SeoMetaServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_parameterized_query_is_noindexed_and_canonicalized(): void
    {
        config([
            'app.url' => 'https://naturalgemstore.com',
            'seo.site_url' => 'https://naturalgemstore.com',
            'seo.query_indexing.noindex_parameterized_pages' => true,
            'seo.query_indexing.allowed_parameters' => ['page'],
        ]);

        $request = Request::create('/gemstones?sort=price', 'GET');
        $meta = app(SeoMetaService::class)->resolve(['request' => $request]);

        $this->assertSame('noindex,follow', $meta['robots']);
        $this->assertSame('https://naturalgemstore.com/gemstones', $meta['canonical']);
    }

    public function test_product_title_template_uses_product_type_suffix(): void
    {
        config([
            'app.url' => 'https://naturalgemstore.com',
            'seo.site_url' => 'https://naturalgemstore.com',
        ]);

        $request = Request::create('/gemstones/ceylon-sapphire-100-ct', 'GET');
        $request->setRouteResolver(fn () => new class {
            public function getName(): string
            {
                return 'gemstones.show';
            }
        });

        $product = new Product([
            'title' => 'Ceylon Sapphire 1.00 ct',
            'origin' => 'Sri Lanka',
            'gem_type' => 'Sapphire',
        ]);

        $meta = app(SeoMetaService::class)->resolve([
            'request' => $request,
            'gemstone' => $product,
        ]);

        $this->assertStringContainsString('Ceylon Sapphire 1.00 ct', $meta['title']);
        $this->assertStringContainsString('Sapphire in Canada', $meta['title']);
    }
}
