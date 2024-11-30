<?php

namespace App\Filament\Resources\BackendSkillsResource\Pages;

use App\Filament\Resources\BackendSkillsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBackendSkills extends EditRecord
{
    protected static string $resource = BackendSkillsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
