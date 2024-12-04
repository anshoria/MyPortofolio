<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectsResource\Pages;
use App\Models\Projects;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class ProjectsResource extends Resource
{
    protected static ?string $model = Projects::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?string $modelLabel = 'Project';

    protected static ?string $pluralModelLabel = 'Projects Portfolio';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'warning';
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'description',
            'category',
            'url',
            'year',
            'price',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Details')
                    ->description('Manage your project information here')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter project title')
                            ->live(onBlur: true)
                            ->autofocus(),

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
                            ->maxLength(4)
                            ->placeholder('YYYY'),

                        TextInput::make('url')
                            ->label('Project URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://example.com')
                            ->suffixIcon('heroicon-m-globe-alt'),

                        TextInput::make('price')
                            ->label('Project Price')
                            ->placeholder('Enter price')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Project Media')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->directory('projects')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080'),

                        FileUpload::make('catalog_img')
                            ->label('Catalog Image')
                            ->image()
                            ->disk('public')
                            ->directory('catalogs')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ]),
                    ])->columns(2),

                Forms\Components\Section::make('Project Description')
                    ->schema([
                        RichEditor::make('description')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('attachments-project')
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->placeholder('Brief description of your project'),
                    ]),

                Forms\Components\Section::make('Project Settings')
                    ->schema([
                        Toggle::make('is_featured')
                            ->label('Featured Project')
                            ->helperText('Display this project in featured section'),

                        Toggle::make('is_catalog')
                            ->label('Show in Catalog')
                            ->helperText('Make this project available in the catalog'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->square()
                    ->size(60)
                    ->extraImgAttributes(['class' => 'rounded-lg object-cover']),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),

                TextColumn::make('category')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Company Profile' => 'info',
                        'Portal Layanan' => 'success',
                        'Landing Page' => 'warning',
                        'Sistem Penjualan' => 'danger',
                        'Sistem Booking atau Reservasi' => 'primary',
                        default => 'gray',
                    }),

                TextColumn::make('year')
                    ->sortable(),

                TextColumn::make('price')
                    ->toggleable(),

                ToggleColumn::make('is_featured')
                    ->label('Featured')
                    ->toggleable(),

                ToggleColumn::make('is_catalog')
                    ->label('Catalog')
                    ->toggleable(),

                TextColumn::make('url')
                    ->label('Link')
                    ->icon('heroicon-m-link')
                    ->copyable()
                    ->openUrlInNewTab()
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                TextColumn::make('created_at')
                    ->label('Published')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->color('success')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateIcon('heroicon-o-document')
            ->emptyStateHeading('No Projects Yet')
            ->emptyStateDescription('Start adding your amazing projects to showcase your portfolio.')
            ->poll();
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProjects::route('/create'),
            'edit' => Pages\EditProjects::route('/{record}/edit'),
        ];
    }
}