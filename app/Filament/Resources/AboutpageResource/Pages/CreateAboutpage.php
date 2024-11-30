<?php

namespace App\Filament\Resources\AboutpageResource\Pages;

use App\Filament\Resources\AboutpageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutpage extends CreateRecord
{
    protected static string $resource = AboutpageResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
