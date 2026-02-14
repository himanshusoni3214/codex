<?php

namespace App\Filament\Resources\EducationPageResource\Pages;

use App\Filament\Resources\EducationPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationPages extends ListRecords
{
    protected static string $resource = EducationPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

