<?php

namespace App\Filament\Widgets;

use App\Models\GemstonePiece;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InventoryKpiWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $availableCount = GemstonePiece::available()->count();
        $reservedCount = GemstonePiece::query()
            ->where('status', 'reserved')
            ->where('reserved_until', '>=', now())
            ->count();
        $soldLast30 = GemstonePiece::query()
            ->where('status', 'sold')
            ->where('sold_at', '>=', now()->subDays(30))
            ->count();

        $availableValue = GemstonePiece::available()
            ->with('product')
            ->get()
            ->sum(function (GemstonePiece $piece) {
                return $piece->computed_price ?? 0;
            });

        return [
            Stat::make('Available Pieces', $availableCount),
            Stat::make('Reserved Pieces', $reservedCount),
            Stat::make('Sold (30 days)', $soldLast30),
            Stat::make('Available Value', 'CAD $' . number_format($availableValue, 2)),
        ];
    }
}
