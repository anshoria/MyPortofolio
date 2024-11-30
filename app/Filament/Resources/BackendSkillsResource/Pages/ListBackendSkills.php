<?php

namespace App\Filament\Resources\BackendSkillsResource\Pages;

use App\Filament\Resources\BackendSkillsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBackendSkills extends ListRecords
{
    protected static string $resource = BackendSkillsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
