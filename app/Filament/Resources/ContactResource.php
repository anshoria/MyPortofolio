<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Contact Information';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contact Details')
                    ->description('Manage your contact information here.')
                    ->schema([
                        Forms\Components\TextInput::make('hp')
                            ->label('Phone Number')
                            ->required()
                            ->tel()
                            ->placeholder('+1 (234) 567-890'),

                        Forms\Components\TextInput::make('location')
                            ->label('Location')
                            ->required()
                            ->placeholder('San Francisco, CA'),

                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp Number')
                            ->required()
                            ->tel()
                            ->placeholder('+1234567890'),

                        Forms\Components\TextInput::make('email')
                            ->label('Email Address')
                            ->required()
                            ->email()
                            ->placeholder('hello@example.com'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hp')
                    ->label('Phone Number')
                    ->searchable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Location')
                    ->searchable(),

                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'hp',
            'location',
            'whatsapp',
            'email',
        ];
    }
}
