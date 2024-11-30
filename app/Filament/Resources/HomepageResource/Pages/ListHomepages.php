<?php

namespace App\Filament\Resources\HomepageResource\Pages;

use App\Filament\Resources\HomepageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;

class ListHomepages extends ListRecords
{
    protected static string $resource = HomepageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn () => HomepageResource::canCreate()),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // If there's only one record, redirect to edit page
        if ($this->getResource()::getModel()::count() === 1) {
            $record = $this->getResource()::getModel()::first();
            return $this->getResource()::getUrl('edit', ['record' => $record]);
        }

        return $this->getResource()::getUrl('index');
    }
}