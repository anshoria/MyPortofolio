<?php

namespace App\Filament\Resources\BackendSkillsResource\Pages;

use App\Filament\Resources\BackendSkillsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBackendSkills extends CreateRecord
{
    protected static string $resource = BackendSkillsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
