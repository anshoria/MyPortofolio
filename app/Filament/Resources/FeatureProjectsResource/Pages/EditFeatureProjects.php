<?php

namespace App\Filament\Resources\FeatureProjectsResource\Pages;

use App\Filament\Resources\FeatureProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeatureProjects extends EditRecord
{
    protected static string $resource = FeatureProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
