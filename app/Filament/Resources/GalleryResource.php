<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galeri';

    protected static ?string $modelLabel = 'Foto';

    protected static ?string $pluralModelLabel = 'Galeri';

    protected static ?string $navigationGroup = 'Berita & Postingan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Select::make('category_id')
                    ->relationship('category', 'name') // Assuming 'name' is the category's display column
                    ->required(),
                Repeater::make('photos')
                    ->label('Photos')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Photo')
                            ->directory('galleries') // Directory to store the files
                            ->image() // Restrict to images
                            ->maxSize(1024) // 1MB limit per image
                            ->required(),
                    ])
                    ->minItems(1) // At least one photo required
                    ->columnSpanFull(), // Optional: full width
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                ImageColumn::make('photos.0') // Display the first photo as a preview
                    ->label('Preview'),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
