<?php

namespace App\Filament\Resources\TypingTestResource\Pages;

use App\Filament\Resources\TypingTestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypingTest extends EditRecord
{
    protected static string $resource = TypingTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
