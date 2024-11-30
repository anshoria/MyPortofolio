<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillsResource\Pages;
use App\Models\Skills;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SkillsResource extends Resource
{
    protected static ?string $model = Skills::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationGroup = 'Skills Management';

    protected static ?string $navigationLabel = 'Other Skills';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Skill Information')
                    ->description('Add or edit skill details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Skill Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Creative minds')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('icon')
                            ->label('Font Awesome Icon')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., fa-lightbulb')
                            ->prefix('fa-')
                            ->helperText('Enter Font Awesome icon name without the fa- prefix')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Skill')
                    ->searchable()
                    ->sortable()
                    ->tooltip(function (Tables\Columns\TextColumn $column): string {
                        return "Skill: {$column->getState()}";
                    }),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => "fa-{$state}")
                    ->icon('heroicon-m-swatch')
                    ->copyable()
                    ->copyMessage('Icon class copied')
                    ->copyMessageDuration(1500),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->modalWidth('md'),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('title', 'asc');
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkills::route('/create'),
            'edit' => Pages\EditSkills::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'icon',
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->title;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Icon' => 'fa-' . $record->icon,
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Other Skill';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Other Skills';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}