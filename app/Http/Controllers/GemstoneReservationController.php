<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservePieceRequest;
use App\Models\Product;
use App\Services\InventoryService;
use Illuminate\Http\RedirectResponse;

class GemstoneReservationController extends Controller
{
    public function store(ReservePieceRequest $request, Product $gemstone, InventoryService $inventory): RedirectResponse
    {
        $piece = $gemstone->availablePieces()->orderBy('id')->first();

        if (! $piece) {
            return back()->with('reservation_error', 'No available pieces at the moment.');
        }

        $data = $request->validated();
        $holdMinutes = (int) ($data['hold_minutes'] ?? 60);

        try {
            $inventory->reservePiece($piece->id, [
                'name' => $data['name'],
                'email' => $data['email'] ?? null,
                'phone' => $data['phone'] ?? null,
                'notes' => $data['notes'] ?? null,
            ], $holdMinutes);
        } catch (\RuntimeException $exception) {
            return back()->with('reservation_error', $exception->getMessage());
        }

        return back()->with('reservation_success', 'Your reservation hold is confirmed. We will contact you shortly.');
    }
}
