<?php

namespace App\Filament\Resources\SiteSeoSettingResource\Pages;

use App\Filament\Resources\SiteSeoSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteSeoSettings extends ListRecords
{
    protected static string $resource = SiteSeoSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

