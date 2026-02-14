<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_purchase_request_stores_order(): void
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $product = Product::create([
            'title' => 'Test Product',
            'slug' => 'test-product',
            'description' => 'Test description',
        ]);

        $response = $this->post('/purchase-request', [
            'name' => 'Order User',
            'email' => 'order@example.com',
            'phone' => '+1 555 555 5555',
            'product_id' => $product->id,
            'message' => 'Interested in this gemstone',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'email' => 'order@example.com',
            'product_id' => $product->id,
        ]);
    }
}
