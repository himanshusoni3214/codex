<?php

namespace App\Filament\Resources\ConsultationTierResource\Pages;

use App\Filament\Resources\ConsultationTierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsultationTier extends EditRecord
{
    protected static string $resource = ConsultationTierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
