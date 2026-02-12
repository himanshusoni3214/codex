<?php

namespace App\Filament\Resources\GemstoneLotResource\Pages;

use App\Filament\Resources\GemstoneLotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGemstoneLots extends ListRecords
{
    protected static string $resource = GemstoneLotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
