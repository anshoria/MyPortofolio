<?php

namespace App\Filament\Resources\FrontendSkillsResource\Pages;

use App\Filament\Resources\FrontendSkillsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFrontendSkills extends CreateRecord
{
    protected static string $resource = FrontendSkillsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
