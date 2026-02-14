<?php

namespace App\Filament\Resources\SiteSeoSettingResource\Pages;

use App\Filament\Resources\SiteSeoSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSiteSeoSetting extends CreateRecord
{
    protected static string $resource = SiteSeoSettingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['same_as'] = collect($data['same_as'] ?? [])
            ->pluck('url')
            ->filter()
            ->values()
            ->all();

        return $data;
    }
}

