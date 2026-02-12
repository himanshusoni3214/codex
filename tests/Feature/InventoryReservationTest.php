<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\GemstonePiece;
use App\Models\GemstoneReservation;
use App\Services\InventoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_expired_reservation_is_released(): void
    {
        $product = Product::create([
            'title' => 'Test Ruby',
            'slug' => 'test-ruby',
            'product_type' => 'gemstone',
            'status' => 'active',
            'sku' => 'TEST-1',
        ]);

        $piece = GemstonePiece::create([
            'product_id' => $product->id,
            'piece_code' => 'TEST-1-001',
            'weight_ct' => 1.2,
            'status' => 'reserved',
            'reserved_until' => now()->subMinutes(5),
        ]);

        GemstoneReservation::create([
            'gemstone_piece_id' => $piece->id,
            'customer_name' => 'Customer',
            'hold_minutes' => 60,
            'expires_at' => now()->subMinutes(1),
            'status' => 'active',
        ]);

        $service = app(InventoryService::class);
        $service->releaseExpiredReservations();

        $this->assertDatabaseHas('gemstone_reservations', [
            'gemstone_piece_id' => $piece->id,
            'status' => 'expired',
        ]);

        $this->assertDatabaseHas('gemstone_pieces', [
            'id' => $piece->id,
            'status' => 'available',
        ]);
    }
}
