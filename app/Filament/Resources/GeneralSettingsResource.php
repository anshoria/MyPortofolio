<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneralSettingsResource\Pages;
use App\Models\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GeneralSettingsResource extends Resource
{
    protected static ?string $model = GeneralSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'General Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Logo')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Website Logo')
                            ->image()
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('CV')
                    ->schema([
                        Forms\Components\FileUpload::make('cv')
                            ->label('CV')
                            ->disk('public')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Social Media Links')
                    ->description('Add your social media profile URLs')
                    ->schema([
                        Forms\Components\TextInput::make('github')
                            ->label('GitHub Profile')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('github.com/yourusername'),

                        Forms\Components\TextInput::make('linkedin')
                            ->label('LinkedIn Profile')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('linkedin.com/in/yourusername'),

                        Forms\Components\TextInput::make('instagram')
                            ->label('Instagram Profile')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('instagram.com/yourusername'),

                        Forms\Components\TextInput::make('x')
                            ->label('X (Twitter) Profile')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('twitter.com/yourusername'),

                        Forms\Components\TextInput::make('tiktok')
                            ->label('TikTok Profile')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('tiktok.com/@yourusername'),

                        Forms\Components\TextInput::make('youtube')
                            ->label('YouTube Channel')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('youtube.com/@yourchannel'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->square()
                    ->size(40),
                Tables\Columns\TextColumn::make('cv')
                    ->label('CV')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('github')
                    ->label('GitHub')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('linkedin')
                    ->label('LinkedIn')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('instagram')
                    ->label('Instagram')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('x')
                    ->label('X (Twitter)')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('tiktok')
                    ->label('TikTok')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('youtube')
                    ->label('YouTube')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGeneralSettings::route('/'),
            'create' => Pages\CreateGeneralSettings::route('/create'),
            'edit' => Pages\EditGeneralSettings::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'github',
            'linkedin',
            'instagram',
            'x',
            'tiktok',
            'youtube'
        ];
    }
}
