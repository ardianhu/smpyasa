<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfrastructureResource\Pages;
use App\Filament\Resources\InfrastructureResource\RelationManagers;
use App\Models\Infrastructure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfrastructureResource extends Resource
{
    protected static ?string $model = Infrastructure::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Sarana Prasarana';

    protected static ?string $modelLabel = 'Sarana Prasarana';

    protected static ?string $pluralModelLabel = 'Sarana Prasarana';

    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\RichEditor::make('tupoksi')
                    ->label('Tupoksi Sarana Prasarana')
                    ->placeholder('Isi Tupoksi Sarana Prasarana')
                    ->required(),

                Forms\Components\RichEditor::make('ruang_kasek')
                    ->label('Ruang Kepala Sekolah')
                    ->placeholder('Isi Ruang Kepala Sekolah')
                    ->required(),

                Forms\Components\RichEditor::make('ruang_guru')
                    ->label('Ruang Guru')
                    ->placeholder('Isi Ruang Guru')
                    ->required(),

                Forms\Components\RichEditor::make('aula')
                    ->label('Aula')
                    ->placeholder('Isi Aula')
                    ->required(),

                Forms\Components\RichEditor::make('perpustakaan')
                    ->label('Perpustakaan')
                    ->placeholder('Isi Perpustakaan')
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
            'index' => Pages\ListInfrastructures::route('/'),
            'create' => Pages\CreateInfrastructure::route('/create'),
            'edit' => Pages\EditInfrastructure::route('/{record}/edit'),
        ];
    }
}
