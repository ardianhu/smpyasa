<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicRelationResource\Pages;
use App\Filament\Resources\PublicRelationResource\RelationManagers;
use App\Models\PublicRelation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublicRelationResource extends Resource
{
    protected static ?string $model = PublicRelation::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function canCreate(): bool
    {
        return auth()->user()->role->name !== 'default';
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->role->name !== 'default';
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->role->name !== 'default';
    }

    protected static ?string $navigationLabel = 'Humas';

    protected static ?string $modelLabel = 'Humas';

    protected static ?string $pluralModelLabel = 'Humas';

    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\RichEditor::make('tupoksi')
                    ->label('Tupoksi Humas')
                    ->placeholder('Isi Tupoksi Humas')
                    ->required(),

                Forms\Components\RichEditor::make('info_humas')
                    ->label('Info Humas')
                    ->placeholder('Isi Info Humas')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('Sarana Prasarana')
                    ->label('Sarana Prasarana')
                    ->getStateUsing(fn() => 'Halaman Sarana Prasarana')
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
            'index' => Pages\ListPublicRelations::route('/'),
            'create' => Pages\CreatePublicRelation::route('/create'),
            'edit' => Pages\EditPublicRelation::route('/{record}/edit'),
        ];
    }
}
