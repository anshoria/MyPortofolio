<?php

namespace App\Filament\Resources\BlogResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $title = 'Blog Comments';
    
    protected static ?string $recordTitleAttribute = 'name';
    
    protected static ?string $modelLabel = 'Comment';
    
    protected static ?string $pluralModelLabel = 'Comments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Comment Information')
                    ->description('Enter the comment details.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter commenter name')
                            ->columnSpanFull(),
                            
                        Forms\Components\Textarea::make('comment')
                            ->required()
                            ->maxLength(65535)
                            ->placeholder('Write your comment here...')
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('like')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->dehydrated(true)  // ubah ke true
                            ->suffix('likes'),

                            Forms\Components\Hidden::make('parent_id')
                    ->dehydrated(fn ($state) => filled($state)),
                    ])
                    ->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user')
                    ->weight('bold'),
                    
                Tables\Columns\TextColumn::make('comment')
                    ->limit(50)
                    ->searchable()
                    ->wrap()
                    ->html()
                    ->tooltip(function ($record) {
                        return $record->comment;
                    }),
                    
                Tables\Columns\TextColumn::make('like')
                    ->numeric()
                    ->sortable()
                    ->alignment('center')
                    ->label('Likes')
                    ->color('success')
                    ->icon('heroicon-o-heart'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->date('M d, Y H:i')
                    ->description(fn ($record) => $record->created_at->diffForHumans())
                    ->icon('heroicon-o-clock'),
                    
                    Tables\Columns\TextColumn::make('replies_count')
                    ->counts('replies')
                    ->label('Replies')
                    ->alignCenter(),
            ])
            ->filters([
                Tables\Filters\Filter::make('popular')
                    ->query(fn (Builder $query): Builder => $query->where('like', '>', 5))
                    ->label('Popular Comments'),
                    
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                
                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'From ' . \Carbon\Carbon::parse($data['created_from'])->toFormattedDateString();
                        }
                
                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Until ' . \Carbon\Carbon::parse($data['created_until'])->toFormattedDateString();
                        }
                
                        return $indicators;
                    }),
            ])
            ->filtersFormColumns(2)
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->modalHeading('Create new comment')
                    ->modalDescription('Add a new comment to this blog post.')
                    ->modalWidth('lg'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalContent(fn ($record) => view('filament.custom.comment-view', [
                        'comment' => $record->load('replies.replies')
                    ])),
                Tables\Actions\Action::make('reply')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->form([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('comment')
                            ->required()
                            ->maxLength(65535),
                    ])
                    ->action(function ($data, $record) {
                        $record->replies()->create([
                            'blog_id' => $record->blog_id,
                            'name' => $data['name'],
                            'comment' => $data['comment'],
                            'like' => 0,
                        ]);
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->requiresConfirmation()
                    ->modalDescription('Are you sure you want to delete these comments? This action cannot be undone.'),
            ])
            ->emptyStateIcon('heroicon-o-chat-bubble-bottom-center-text')
            ->emptyStateHeading('No comments yet')
            ->emptyStateDescription('Once comments are added, they will appear here.')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Comment')
                    ->icon('heroicon-o-plus'),
            ])
            ->poll('30s')
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNull('parent_id'))
            ->defaultSort('created_at', 'desc');
    }
}