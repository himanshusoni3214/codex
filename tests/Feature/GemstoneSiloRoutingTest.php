<?php

namespace Tests\Feature;

use App\Models\GemstonePiece;
use App\Models\GemstoneType;
use App\Models\Origin;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GemstoneSiloRoutingTest extends TestCase
{
    use RefreshDatabase;

    public function test_origin_route_respects_bound_type_when_origin_is_type_scoped(): void
    {
        $sapphire = GemstoneType::create([
            'name' => 'Sapphire',
            'slug' => 'sapphire',
            'is_indexable' => true,
        ]);

        $ruby = GemstoneType::create([
            'name' => 'Ruby',
            'slug' => 'ruby',
            'is_indexable' => true,
        ]);

        $ceylon = Origin::create([
            'name' => 'Ceylon',
            'slug' => 'ceylon',
            'gemstone_type_id' => $sapphire->id,
            'is_indexable' => true,
        ]);

        $product = Product::create([
            'title' => 'Ceylon Sapphire 1.00 ct',
            'slug' => 'ceylon-sapphire-1-00-ct',
            'product_type' => 'gemstone',
            'status' => 'active',
            'sku' => 'SAP-100',
            'short_description' => 'Test gemstone',
        ]);
        $product->gemstoneTypes()->attach($sapphire->id);
        $product->origins()->attach($ceylon->id);

        GemstonePiece::create([
            'product_id' => $product->id,
            'piece_code' => 'SAP-100-001',
            'weight_ct' => 1.00,
            'status' => 'available',
        ]);

        $this->get('/gemstones/sapphire/ceylon')->assertOk();
        $this->get('/gemstones/ruby/ceylon')->assertNotFound();
    }

    public function test_product_detail_supports_type_slug_path_and_legacy_path_redirects(): void
    {
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
            'short_description' => 'Test gemstone',
        ]);
        $product->gemstoneTypes()->attach($type->id);

        GemstonePiece::create([
            'product_id' => $product->id,
            'piece_code' => '101-001',
            'weight_ct' => 12.50,
            'status' => 'available',
        ]);

        $this->get('/gemstones/sapphire/bkk-big-blue-sapphire-101')
            ->assertOk()
            ->assertSee('BKK Big Blue Sapphire 101');

        $this->get('/gemstones/bkk-big-blue-sapphire-101')
            ->assertRedirect('/gemstones/sapphire/bkk-big-blue-sapphire-101');
    }
}
