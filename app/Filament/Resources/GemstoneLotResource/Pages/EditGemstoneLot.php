<?php

namespace App\Filament\Resources\GemstoneLotResource\Pages;

use App\Filament\Resources\GemstoneLotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGemstoneLot extends EditRecord
{
    protected static string $resource = GemstoneLotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
