<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageResource\Pages;
use App\Models\Homepage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class HomepageResource extends Resource
{
    protected static ?string $model = Homepage::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Homepage';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Homepage Content';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'description',
        ];
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Homepage Content')
                    ->description('Manage your homepage main content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter homepage title')
                            ->helperText('This will be displayed as the main heading on your homepage'),

                        Textarea::make('description')
                            ->required()
                            ->maxLength(1000)
                            ->placeholder('Enter homepage description')
                            ->helperText('This will appear under the main title'),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                
                TextColumn::make('description')
                    ->searchable()
                    ->sortable()
                    ->limit(100)
                    ->html(),
                
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalWidth('md'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepages::route('/'),
            'create' => Pages\CreateHomepage::route('/create'),
            'edit' => Pages\EditHomepage::route('/{record}/edit'),
        ];
    }


    public static function canCreate(): bool
    {
        return static::getModel()::count() === 0;
    }
}