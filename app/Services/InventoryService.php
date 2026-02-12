<?php

namespace App\Services;

use App\Models\GemstonePiece;
use App\Models\GemstoneReservation;
use Illuminate\Database\DatabaseManager;

class InventoryService
{
    public function __construct(private DatabaseManager $db)
    {
    }

    public function reservePiece(int $pieceId, array $customerInfo, int $holdMinutes = 60): GemstoneReservation
    {
        return $this->db->transaction(function () use ($pieceId, $customerInfo, $holdMinutes) {
            $piece = GemstonePiece::query()->lockForUpdate()->findOrFail($pieceId);

            $now = now();
            if ($piece->status !== 'available' || ($piece->reserved_until && $piece->reserved_until->isFuture())) {
                throw new \RuntimeException('Piece is not available for reservation.');
            }

            $expiresAt = $now->copy()->addMinutes($holdMinutes);

            $piece->status = 'reserved';
            $piece->reserved_until = $expiresAt;
            $piece->reserved_by = $customerInfo['name'] ?? null;
            $piece->save();

            return GemstoneReservation::create([
                'gemstone_piece_id' => $piece->id,
                'customer_name' => $customerInfo['name'] ?? 'Customer',
                'customer_email' => $customerInfo['email'] ?? null,
                'customer_phone' => $customerInfo['phone'] ?? null,
                'hold_minutes' => $holdMinutes,
                'expires_at' => $expiresAt,
                'status' => 'active',
                'notes' => $customerInfo['notes'] ?? null,
            ]);
        });
    }

    public function releaseExpiredReservations(): int
    {
        $expired = 0;

        $reservations = GemstoneReservation::query()
            ->where('status', 'active')
            ->where('expires_at', '<', now())
            ->with('piece')
            ->get();

        foreach ($reservations as $reservation) {
            $reservation->status = 'expired';
            $reservation->save();
            $expired++;

            $piece = $reservation->piece;
            if ($piece && $piece->status === 'reserved' && ($piece->reserved_until?->isPast() ?? true)) {
                $piece->status = 'available';
                $piece->reserved_until = null;
                $piece->reserved_by = null;
                $piece->save();
            }
        }

        return $expired;
    }

    public function markSold(int $pieceId, array $saleMeta = []): GemstonePiece
    {
        return $this->db->transaction(function () use ($pieceId, $saleMeta) {
            $piece = GemstonePiece::query()->lockForUpdate()->findOrFail($pieceId);

            $piece->status = 'sold';
            $piece->sold_at = $saleMeta['sold_at'] ?? now();
            $piece->reserved_until = null;
            $piece->reserved_by = null;
            $piece->save();

            $reservation = $piece->reservations()->where('status', 'active')->latest()->first();
            if ($reservation) {
                $reservation->status = 'converted';
                $reservation->save();
            }

            return $piece;
        });
    }

    public function computePrice(GemstonePiece $piece): ?float
    {
        if ($piece->price_total_cad !== null) {
            return (float) $piece->price_total_cad;
        }

        $rate = $piece->rate_per_carat_cad ?? $piece->product?->rate_per_carat;
        if ($rate === null || $piece->weight_ct === null) {
            return null;
        }

        return round((float) $rate * (float) $piece->weight_ct, 2);
    }
}
