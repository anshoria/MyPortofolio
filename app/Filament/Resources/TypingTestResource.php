<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypingTestResource\Pages;
use App\Models\TypingTest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class TypingTestResource extends Resource
{
    protected static ?string $model = TypingTest::class;

    protected static ?string $navigationIcon = 'heroicon-o-command-line';

    protected static ?string $navigationLabel = 'Typing Tests';

    protected static ?string $modelLabel = 'Typing Test';

    protected static ?string $navigationGroup = 'Game Management';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'wpm',
            'accuracy',
            'timeleft',
            'language',
            'avg_score',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Player Information')
                    ->description('Basic information about the player')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter player name'),
                        Select::make('language')
                            ->required()
                            ->options([
                                'en' => 'English',
                                'id' => 'Indonesian'
                            ])
                            ->native(false),
                    ])
                    ->columns(2),

                Section::make('Performance Metrics')
                    ->description('Typing test performance results')
                    ->icon('heroicon-o-chart-bar')
                    ->schema([
                        TextInput::make('wpm')
                            ->label('WPM (Words Per Minute)')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->step(1)
                            ->suffixIcon('heroicon-m-calculator')
                            ->live(debounce: 1000)
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $wpm = floatval($state ?? 0);
                                $accuracy = floatval($get('accuracy') ?? 0);
                                $avg_score = round(($wpm * 0.3) + ($accuracy * 0.7));
                                $set('avg_score', $avg_score);
                            }),

                        TextInput::make('accuracy')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%')
                            ->step(1)
                            ->suffixIcon('heroicon-m-check-circle')
                            ->live(debounce: 1000)
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $wpm = floatval($get('wpm') ?? 0);
                                $accuracy = floatval($state ?? 0);
                                $avg_score = round(($wpm * 0.3) + ($accuracy * 0.7));
                                $set('avg_score', $avg_score);
                            }),

                        TextInput::make('timeleft')
                            ->label('Time Left')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(60)
                            ->suffix('seconds')
                            ->step(1)
                            ->suffixIcon('heroicon-m-clock'),

                        TextInput::make('avg_score')
                            ->label('Average Score')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->step(1)
                            ->suffixIcon('heroicon-m-chart-bar')
                            ->disabled()
                            ->dehydrated(true),

                    ])
                    ->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-m-user')
                    ->weight('bold'),

                TextColumn::make('language')
                    ->badge()
                    ->colors([
                        'warning' => 'en',
                        'success' => 'id',
                    ])
                    ->formatStateUsing(fn(string $state): string => [
                        'en' => 'English',
                        'id' => 'Indonesian',
                    ][$state])
                    ->alignCenter(),

                TextColumn::make('wpm')
                    ->badge()
                    ->label('WPM')
                    ->sortable()
                    ->color(fn(Model $record): string => match (true) {
                        $record->wpm >= 80 => 'success',
                        $record->wpm >= 50 => 'warning',
                        default => 'danger',
                    })
                    ->alignCenter(),

                TextColumn::make('accuracy')
                    ->badge()
                    ->sortable()
                    ->color(fn(Model $record): string => match (true) {
                        $record->accuracy >= 95 => 'success',
                        $record->accuracy >= 80 => 'warning',
                        default => 'danger',
                    })
                    ->suffix('%')
                    ->alignCenter(),

                TextColumn::make('avg_score')
                    ->badge()
                    ->label('Avg Score')
                    ->sortable()
                    ->color(fn(Model $record): string => match (true) {
                        $record->avg_score >= 90 => 'success',
                        $record->avg_score >= 70 => 'warning',
                        default => 'danger',
                    })
                    ->alignCenter(),

                TextColumn::make('timeleft')
                    ->badge()
                    ->label('Time Left')
                    ->sortable()
                    ->color(fn(Model $record): string => match (true) {
                        $record->timeleft >= 30 => 'success',
                        $record->timeleft >= 15 => 'warning',
                        default => 'danger',
                    })
                    ->suffix(' sec')
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('Test Date')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->icon('heroicon-m-calendar'),
            ])
            ->defaultSort('avg_score', 'desc')
            ->filters([
                SelectFilter::make('language')
                    ->options([
                        'en' => 'English',
                        'id' => 'Indonesian',
                    ]),

                SelectFilter::make('performance_level')
                    ->options([
                        'beginner' => 'Beginner (< 30 WPM)',
                        'intermediate' => 'Intermediate (30-60 WPM)',
                        'advanced' => 'Advanced (60-80 WPM)',
                        'expert' => 'Expert (80+ WPM)',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (empty($data['value'])) return $query;

                        return $query->when($data['value'] === 'beginner', fn($q) => $q->where('wpm', '<', 30))
                            ->when($data['value'] === 'intermediate', fn($q) => $q->whereBetween('wpm', [30, 59]))
                            ->when($data['value'] === 'advanced', fn($q) => $q->whereBetween('wpm', [60, 79]))
                            ->when($data['value'] === 'expert', fn($q) => $q->where('wpm', '>=', 80));
                    }),

                SelectFilter::make('accuracy_range')
                    ->options([
                        'perfect' => 'Perfect (100%)',
                        'excellent' => 'Excellent (95-99%)',
                        'good' => 'Good (80-94%)',
                        'needs_improvement' => 'Needs Improvement (<80%)',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (empty($data['value'])) return $query;

                        return $query->when($data['value'] === 'perfect', fn($q) => $q->where('accuracy', '=', 100))
                            ->when($data['value'] === 'excellent', fn($q) => $q->whereBetween('accuracy', [95, 99]))
                            ->when($data['value'] === 'good', fn($q) => $q->whereBetween('accuracy', [80, 94]))
                            ->when($data['value'] === 'needs_improvement', fn($q) => $q->where('accuracy', '<', 80));
                    }),
                SelectFilter::make('avg_score_range')
                    ->options([
                        'excellent' => 'Excellent (90+)',
                        'good' => 'Good (70-89)',
                        'average' => 'Average (50-69)',
                        'needs_improvement' => 'Needs Improvement (<50)',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (empty($data['value'])) return $query;

                        return $query->when($data['value'] === 'excellent', fn($q) => $q->where('avg_score', '>=', 90))
                            ->when($data['value'] === 'good', fn($q) => $q->whereBetween('avg_score', [70, 89]))
                            ->when($data['value'] === 'average', fn($q) => $q->whereBetween('avg_score', [50, 69]))
                            ->when($data['value'] === 'needs_improvement', fn($q) => $q->where('avg_score', '<', 50));
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->icon('heroicon-m-eye'),
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-m-pencil'),
                    Tables\Actions\DeleteAction::make()
                        ->icon('heroicon-m-trash'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->icon('heroicon-m-trash'),
                ]),
            ])
            ->emptyStateHeading('No Typing Tests Yet')
            ->emptyStateDescription('Once users complete typing tests, their scores will appear here.')
            ->emptyStateIcon('heroicon-o-command-line')
            ->striped()
            ->poll('30s');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypingTests::route('/'),
            'create' => Pages\CreateTypingTest::route('/create'),
            'edit' => Pages\EditTypingTest::route('/{record}/edit'),
        ];
    }
}
