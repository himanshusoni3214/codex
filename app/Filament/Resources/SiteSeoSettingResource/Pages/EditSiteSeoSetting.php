<?php

namespace App\Filament\Resources\SiteSeoSettingResource\Pages;

use App\Filament\Resources\SiteSeoSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteSeoSetting extends EditRecord
{
    protected static string $resource = SiteSeoSettingResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['same_as'] = collect($data['same_as'] ?? [])
            ->map(fn ($url) => ['url' => $url])
            ->all();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['same_as'] = collect($data['same_as'] ?? [])
            ->pluck('url')
            ->filter()
            ->values()
            ->all();

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

