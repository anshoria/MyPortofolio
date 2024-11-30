<?php

namespace App\Filament\Resources\AboutpageResource\Pages;

use App\Filament\Resources\AboutpageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutpages extends ListRecords
{
    protected static string $resource = AboutpageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
