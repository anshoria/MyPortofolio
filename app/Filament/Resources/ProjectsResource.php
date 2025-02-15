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
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Toggle;
use Filament\Support\RawJs;
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
            'tech_stack',
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

                        TextInput::make('category')
                            ->required()
                            ->placeholder('example: Landing Page')
                            ->datalist([
                                'Company Profile',
                                'Portal Layanan',
                                'Landing Page',
                                'Sistem Penjualan',
                                'Sistem Booking atau Reservasi',
                                'Game',
                                'Blog atau Media Informasi',
                                'Data Visualization',
                            ]),
                        TagsInput::make('tech_stack')
                            ->placeholder('Add technologies')
                            ->suggestions([
                                'Tailwindcss',
                                'Bootstrap',
                                'Alpinejs',
                                'Laravel',
                                'Livewire',
                                'Vue.js',
                                'React',
                                'Filament',
                                'MySQL',
                                'PostgreSQL',
                                'Docker',
                                'AWS',
                                'Redis',
                            ])
                            ->required(),

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
                            ->maxLength(255)
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(','),

                        TextInput::make('discount_percentage')
                            ->label('Discount (%)')
                            ->placeholder('Enter discount percentage')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%')
                            ->live(debounce: 1000)
                            ->afterStateUpdated(function ($state, Forms\Set $set, Forms\Get $get) {
                                if ($state && $get('price')) {
                                    $price = (int) str_replace(['Rp', '.', ','], '', $get('price'));
                                    $discount = (int) $state;
                                    $finalPrice = $price - ($price * $discount / 100);
                                    $set('final_price', number_format($finalPrice, 0, '', ''));
                                }
                            }),

                        TextInput::make('final_price')
                            ->label('Final Price')
                            ->disabled()
                            ->numeric()
                            ->formatStateUsing(function ($state) {
                                if ($state) {
                                    return number_format($state, 0, '', '');
                                }
                                return $state;
                            })
                            ->dehydrated(true)
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(','),
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

                        Toggle::make('is_cta')
                            ->label('CTA in Homepage')
                            ->helperText('Display cta in homepage'),
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

                ToggleColumn::make('is_cta')
                    ->label('CTA')
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
                    ->toggleable()
                    ->toggledHiddenByDefault(),
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
