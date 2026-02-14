<?php

namespace App\Filament\Resources\GemstoneTypeResource\Pages;

use App\Filament\Resources\GemstoneTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGemstoneTypes extends ListRecords
{
    protected static string $resource = GemstoneTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

