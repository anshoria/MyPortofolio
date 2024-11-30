<?php

namespace App\Filament\Resources\TypingTestResource\Pages;

use App\Filament\Resources\TypingTestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypingTests extends ListRecords
{
    protected static string $resource = TypingTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
