<?php

namespace App\Filament\Resources\EducationPageResource\Pages;

use App\Filament\Resources\EducationPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationPage extends EditRecord
{
    protected static string $resource = EducationPageResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['section'] = 'education';
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

