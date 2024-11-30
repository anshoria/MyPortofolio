<?php

namespace App\Filament\Resources\FeatureProjectsResource\Pages;

use App\Filament\Resources\FeatureProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeatureProjects extends CreateRecord
{
    protected static string $resource = FeatureProjectsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
