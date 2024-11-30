<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutpageResource\Pages;
use App\Models\Aboutpage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AboutpageResource extends Resource
{
    protected static ?string $model = Aboutpage::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'About Page';

    protected static ?int $navigationSort = 3;

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'description',
            'experience',
            'projects',
            'satisfaction',
            'support',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('About Information')
                    ->description('Manage your about page content here.')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Profile Image')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->required()
                            ->maxSize(5120)
                            ->directory('about-images')
                            ->columnSpanFull()
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('800')
                            ->preserveFilenames()
                            ->visibility('public'),

                        Forms\Components\Textarea::make('description')
                            ->label('About Description')
                            ->required()
                            ->placeholder('Write description here..')
                            ->columnSpanFull()
                            ->rows(5),
                    ]),

                Forms\Components\Section::make('Statistics')
                    ->description('Update your statistics information.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('experience')
                            ->label('Years of Experience')
                            ->required()
                            ->placeholder('e.g., 5+')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('projects')
                            ->label('Projects Completed')
                            ->required()
                            ->placeholder('e.g., 100+')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('satisfaction')
                            ->label('Satisfaction Rate')
                            ->required()
                            ->placeholder('e.g., 99%')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('support')
                            ->label('Support Availability')
                            ->required()
                            ->placeholder('e.g., 24/7')
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Profile Image')
                    ->square()
                    ->size(100),

                Tables\Columns\TextColumn::make('description')
                    ->label('About Description')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (Tables\Columns\TextColumn $column): string {
                        return $column->getState();
                    }),

                Tables\Columns\TextColumn::make('experience')
                    ->label('Experience')
                    ->searchable(),

                Tables\Columns\TextColumn::make('projects')
                    ->label('Projects')
                    ->searchable(),

                Tables\Columns\TextColumn::make('satisfaction')
                    ->label('Satisfaction')
                    ->searchable(),

                Tables\Columns\TextColumn::make('support')
                    ->label('Support')
                    ->searchable(),

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
                Tables\Actions\EditAction::make()
                    ->modalWidth('xl'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutpages::route('/'),
            'create' => Pages\CreateAboutpage::route('/create'),
            'edit' => Pages\EditAboutpage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'About Page';
    }
}
