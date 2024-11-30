<?php

namespace App\Filament\Resources\FeatureProjectsResource\Pages;

use App\Filament\Resources\FeatureProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeatureProjects extends ListRecords
{
    protected static string $resource = FeatureProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
