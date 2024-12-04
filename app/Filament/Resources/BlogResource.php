<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    
    protected static ?string $navigationGroup = 'Content Management';
    
    protected static ?int $navigationSort = 1;
    
    protected static ?string $navigationLabel = 'Blog Posts';
    
    protected static ?string $modelLabel = 'Blog Post';
    
    protected static ?string $pluralModelLabel = 'Blog Posts';
    
    protected static ?string $recordTitleAttribute = 'title';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'title',
            'author',
            'content',
            'category',
            'job',
            'comments.name',
            'comments.comment'
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Author Information')
                    ->description('Enter the author details for this blog post.')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextInput::make('author')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('John Doe')
                            ->autocomplete(false),
                        
                        TextInput::make('job')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Senior Content Writer')
                            ->autocomplete(false),
                    ])->columns(2),

                Forms\Components\Section::make('Blog Content')
                    ->description('Write and format your blog post content here.')
                    ->icon('heroicon-o-pencil')
                    ->collapsible()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter blog title')
                            ->columnSpanFull()
                            ->live()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug())),

                        FileUpload::make('cover_img')
                            ->image()
                            ->directory('blog-covers')
                            ->required()
                            ->imageEditor()
                            ->columnSpanFull()
                            ->hint('Recommended size: 1200x630px')
                            ->imagePreviewHeight('250')
                            ->panelLayout('integrated'),

                        RichEditor::make('content')
                            ->required()
                            ->placeholder('Type your contetnt here..')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('attachments-blog')
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
                            ->columnSpanFull(),

                        Select::make('category')
                            ->options([
                                'Company News' => 'Company News',
                                'Tutorial' => 'Tutorial',
                                'Technology' => 'Technology',
                                'Updates' => 'Updates',
                                'Case Study' => 'Case Study',
                                'Olahraga' => 'Olahraga',
                            ])
                            ->required()
                            ->native(false)
                            ->searchable(),

                        DateTimePicker::make('published')
                            ->required()
                            ->native(false)
                            ->default(now())
                            ->displayFormat('M d, Y H:i'),
                    ]),

                Forms\Components\Section::make('Engagement Metrics')
                    ->description('Track the performance of your blog post.')
                    ->icon('heroicon-o-chart-bar')
                    ->schema([
                        TextInput::make('likes')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->suffix('likes')
                            ->dehydrated(false),
                    ])
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published', 'desc')
            ->columns([
                ImageColumn::make('cover_img')
                    ->label('Cover')
                    ->square()
                    ->defaultImageUrl(url('/images/placeholder.png')),
                    
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('author')
                    ->searchable()
                    ->sortable()
                    ->description(fn (Blog $record): string => $record->job),
                    
                TextColumn::make('category')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Company News' => 'success',
                        'Tutorial' => 'info',
                        'Technology' => 'danger',
                        'Updates' => 'warning',
                        'Case Study' => 'gray',
                        default => 'primary',
                    }),
                    
                TextColumn::make('published')
                    ->dateTime()
                    ->sortable()
                    ->date('M d, Y')
                    ->description(fn (Blog $record): string => $record->published->diffForHumans()),
                    
                TextColumn::make('likes')
                    ->numeric()
                    ->sortable()
                    ->alignment('center')
                    ->label('Likes')
                    ->color('success')
                    ->description('Total likes'),
                    
                TextColumn::make('comments_count')
                    ->counts('comments')
                    ->label('Comments')
                    ->alignment('center')
                    ->color('primary')
                    ->description('Total comments'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->multiple()
                    ->options([
                        'Company News' => 'Company News',
                        'Tutorial' => 'Tutorial',
                        'Technology' => 'Technology',
                        'Updates' => 'Updates',
                        'Case Study' => 'Case Study',
                    ]),
                    
                Tables\Filters\Filter::make('published')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')
                            ->placeholder('From')
                            ->native(false),
                        Forms\Components\DatePicker::make('published_until')
                            ->placeholder('Until')
                            ->native(false),
                    ])
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                
                        if ($data['published_from'] ?? null) {
                            $indicators['published_from'] = 'Published from ' . Carbon::parse($data['published_from'])->toFormattedDateString();
                        }
                
                        if ($data['published_until'] ?? null) {
                            $indicators['published_until'] = 'Published until ' . Carbon::parse($data['published_until'])->toFormattedDateString();
                        }
                
                        return $indicators;
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalWidth('7xl')
                    ->modalHeading(fn (Blog $record): string => "Viewing: {$record->title}"),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ])
            ->emptyStateIcon('heroicon-o-document')
            ->emptyStateHeading('No blog posts yet')
            ->emptyStateDescription('Start writing your first blog post by clicking the button below.')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Create Blog Post')
                    ->icon('heroicon-o-plus'),
            ]);
    }



    public static function getRelations(): array
    {
        return [
            RelationManagers\CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}