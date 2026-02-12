<?php

namespace App\Filament\Resources\ConsultationTierResource\Pages;

use App\Filament\Resources\ConsultationTierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsultationTiers extends ListRecords
{
    protected static string $resource = ConsultationTierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
