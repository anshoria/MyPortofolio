<?php

namespace App\Filament\Resources\FrontendSkillsResource\Pages;

use App\Filament\Resources\FrontendSkillsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFrontendSkills extends ListRecords
{
    protected static string $resource = FrontendSkillsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
