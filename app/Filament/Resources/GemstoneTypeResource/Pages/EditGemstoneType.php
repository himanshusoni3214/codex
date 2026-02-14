<?php

namespace App\Filament\Resources\GemstoneTypeResource\Pages;

use App\Filament\Resources\GemstoneTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGemstoneType extends EditRecord
{
    protected static string $resource = GemstoneTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

