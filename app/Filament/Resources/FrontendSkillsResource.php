<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FrontendSkillsResource\Pages;
use App\Models\FrontendSkills;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class FrontendSkillsResource extends Resource
{
    protected static ?string $model = FrontendSkills::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';

    protected static ?string $navigationGroup = 'Skills Management';

    protected static ?string $navigationLabel = 'Frontend Skills';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Skill Information')
                    ->description('Add or edit frontend skill details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Skill Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., HTML5/CSS3')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('rate')
                            ->label('Proficiency Rate')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(1)
                            ->suffix('%')
                            ->helperText('Enter skill proficiency percentage (0-100)')
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

                Tables\Columns\TextColumn::make('rate')
                    ->label('Proficiency')
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => $state . '%')
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        $state >= 80 => 'success',
                        $state >= 60 => 'warning',
                        default => 'danger',
                    }),

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
                Tables\Filters\SelectFilter::make('proficiency')
                    ->options([
                        'beginner' => 'Beginner (0-30%)',
                        'intermediate' => 'Intermediate (31-70%)',
                        'expert' => 'Expert (71-100%)',
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return match ($data['value']) {
                            'beginner' => $query->where('rate', '<=', 30),
                            'intermediate' => $query->whereBetween('rate', [31, 70]),
                            'expert' => $query->where('rate', '>=', 71),
                            default => $query,
                        };
                    }),
            ])
            ->actions([
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
            ->defaultSort('rate', 'desc');
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
            'index' => Pages\ListFrontendSkills::route('/'),
            'create' => Pages\CreateFrontendSkills::route('/create'),
            'edit' => Pages\EditFrontendSkills::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'rate',
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->title;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Proficiency' => $record->rate . '%',
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Frontend Skill';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Frontend Skills';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}