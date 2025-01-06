<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\View\TablesRenderHook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    // protected static ?string $navigationGroup = 'Utama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\FileUpload::make('banner')
                            ->label('Banner')
                            ->directory('images')
                            ->disk('public')
                            ->image(),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Title')
                                    ->required(),

                                Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->required(),

                                Forms\Components\Radio::make('is_published')
                                    ->label('Publish this post?')
                                    ->boolean()
                                    ->inline(),

                                Forms\Components\Radio::make('is_featured')
                                    ->label('Feature this post?')
                                    ->boolean()
                                    ->inline(),
                                Forms\Components\Select::make('tags')
                                    ->label('Tags')
                                    ->multiple() // Allow multiple selections
                                    ->relationship('tags', 'name') // Use the tags relationship
                                    ->preload() // Preload existing tags
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->label('Tag Name'), // Form to create a new tag
                                    ])
                                    ->createOptionUsing(function ($data) {
                                        return \App\Models\Tag::create(['name' => $data['name']]);
                                    })
                                    ->searchable() // Allows searching for existing tags
                                    ->allowHtml(), // Optional, if tag names might include HTML
                            ]),

                        Forms\Components\RichEditor::make('description')
                            ->label('Content')
                            ->placeholder('Post Content')
                            ->required(),

                        Hidden::make('user_id')->default(fn() => auth()->id())
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\ImageColumn::make('banner')->square(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                // Editable is_published column
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Published')
                    ->sortable()
                    ->toggleable()
                    ->onColor('success')
                    ->offColor('danger'),

                // Editable is_featured column
                Tables\Columns\ToggleColumn::make('is_featured')
                    ->label('Featured')
                    ->sortable()
                    ->toggleable()
                    ->onColor('success')
                    ->offColor('danger'),
                Tables\Columns\TextColumn::make('view_number'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('category.name')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
