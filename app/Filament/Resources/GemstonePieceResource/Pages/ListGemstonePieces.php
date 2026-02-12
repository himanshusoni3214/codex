<?php

namespace App\Filament\Resources\GemstonePieceResource\Pages;

use App\Filament\Resources\GemstonePieceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGemstonePieces extends ListRecords
{
    protected static string $resource = GemstonePieceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
