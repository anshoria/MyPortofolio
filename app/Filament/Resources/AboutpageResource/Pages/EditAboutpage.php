<?php

namespace App\Filament\Resources\AboutpageResource\Pages;

use App\Filament\Resources\AboutpageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutpage extends EditRecord
{
    protected static string $resource = AboutpageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
