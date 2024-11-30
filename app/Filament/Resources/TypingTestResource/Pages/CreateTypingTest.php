<?php

namespace App\Filament\Resources\TypingTestResource\Pages;

use App\Filament\Resources\TypingTestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTypingTest extends CreateRecord
{
    protected static string $resource = TypingTestResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
