<?php

namespace App\Filament\Resources\EducationPageResource\Pages;

use App\Filament\Resources\EducationPageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEducationPage extends CreateRecord
{
    protected static string $resource = EducationPageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['section'] = 'education';
        return $data;
    }
}

