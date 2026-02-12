<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LowStockWidget extends BaseWidget
{
    protected static ?string $heading = 'Low Stock Alerts';

    protected function getTableQuery(): Builder
    {
        return Product::query()
            ->whereNotNull('sku')
            ->withCount(['availablePieces'])
            ->havingRaw('available_pieces_count <= COALESCE(low_stock_threshold, 3)')
            ->orderBy('available_pieces_count');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')->label('Product')->searchable(),
            Tables\Columns\TextColumn::make('sku')->label('SKU'),
            Tables\Columns\TextColumn::make('available_pieces_count')->label('Available'),
            Tables\Columns\TextColumn::make('low_stock_threshold')->label('Threshold')->default(3),
        ];
    }
}
