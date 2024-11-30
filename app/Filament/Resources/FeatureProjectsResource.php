<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeatureProjectsResource\Pages;
use App\Models\FeatureProjects;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

class FeatureProjectsResource extends Resource
{
    protected static ?string $model = FeatureProjects::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Featured Projects';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Featured Project';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'description',
            'category',
            'url',
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Category' => $record->category,
            'Year' => $record->year,
            'URL' => $record->url,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Project Details')
                    ->description('Add or edit project information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter project title')
                            ->columnSpan(2),

                        TextInput::make('url')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('Enter project URL')
                            ->helperText('Full URL including https://')
                            ->columnSpan(2)
                            ->prefixIcon('heroicon-m-globe-alt'),

                        Select::make('category')
                            ->required()
                            ->options([
                                'Company Profile' => 'Company Profile',
                                'Portal Layanan' => 'Portal Layanan',
                                'Landing Page' => 'Landing Page',
                                'Sistem Penjualan' => 'Sistem Penjualan',
                                'Sistem Booking atau Reservasi' => 'Sistem Booking atau Reservasi',
                                'Game' => 'Game',
                                'Blog atau Media Informasi' => 'Blog atau Media Informasi',
                            ])
                            ->searchable(),

                        TextInput::make('year')
                            ->required()
                            ->numeric()
                            ->minValue(2000)
                            ->maxValue(2100)
                            ->default(date('Y')),

                        Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->maxLength(255)
                            ->placeholder('Enter project description')
                            ->columnSpan(2),

                        FileUpload::make('image')
                            ->required()
                            ->image()
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->directory('feature-projects')
                            ->columnSpan(2)
                            ->helperText('Recommended resolution: 1920x1080px. Image will be automatically resized.'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->square()
                    ->defaultImageUrl(url('/images/placeholder.jpg')),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('url')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-globe-alt'),

                TextColumn::make('category')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Company Profile' => 'info',
                        'Portal Layanan' => 'success',
                        'Landing Page' => 'warning',
                        'Sistem Penjualan' => 'danger',
                        'Sistem Booking atau Reservasi' => 'primary',
                        default => 'gray',
                    }),

                TextColumn::make('year')
                    ->sortable(),

                TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'Company Profile' => 'Company Profile',
                        'Portal Layanan' => 'Portal Layanan',
                        'Landing Page' => 'Landing Page',
                        'Sistem Penjualan' => 'Sistem Penjualan',
                        'Sistem Booking atau Reservasi' => 'Sistem Booking atau Reservasi',
                        'Game' => 'Game',
                        'Blog atau Media Informasi' => 'Blog atau Media Informasi',
                    ])
                    ->label('Category')
                    ->multiple(),

                Filter::make('year')
                    ->form([
                        TextInput::make('year')
                            ->numeric()
                            ->label('Year'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['year'],
                                fn (Builder $query, $year): Builder => $query->where('year', $year),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalWidth('md'),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('visit')
                    ->icon('heroicon-m-globe-alt')
                    ->url(fn (FeatureProjects $record): ?string => $record->url)
                    ->openUrlInNewTab()
                    ->visible(fn (FeatureProjects $record): bool => $record->url !== null),
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
            'index' => Pages\ListFeatureProjects::route('/'),
            'create' => Pages\CreateFeatureProjects::route('/create'),
            'edit' => Pages\EditFeatureProjects::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}