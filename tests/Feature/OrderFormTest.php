<?php

namespace Tests\Feature;

use App\Models\Gemstone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_purchase_request_stores_order(): void
    {
        $gemstone = Gemstone::create([
            'title' => 'Test Gemstone',
            'slug' => 'test-gemstone',
            'description' => 'Test description',
        ]);

        $response = $this->post('/purchase-request', [
            'name' => 'Order User',
            'email' => 'order@example.com',
            'phone' => '+1 555 555 5555',
            'service_id' => $gemstone->id,
            'message' => 'Interested in this gemstone',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'email' => 'order@example.com',
            'service_id' => $gemstone->id,
        ]);
    }
}
