<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurriculumResource\Pages;
use App\Filament\Resources\CurriculumResource\RelationManagers;
use App\Models\Curriculum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CurriculumResource extends Resource
{
    protected static ?string $model = Curriculum::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Kurikulum';

    protected static ?string $modelLabel = 'Kurikulum';

    protected static ?string $pluralModelLabel = 'Kurikulum';

    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\RichEditor::make('tentang_kurikulum')
                    ->label('Tentang Kurikulum')
                    ->placeholder('Isi Tentang Kurikulum')
                    ->required(),

                Forms\Components\RichEditor::make('info_kurikulum')
                    ->label('Info Kurikulum')
                    ->placeholder('Isi Info Kurikulum')
                    ->required(),

                Forms\Components\RichEditor::make('kalender_akademik')
                    ->label('Kalender Akademik')
                    ->placeholder('Isi Kalender Akademik')
                    ->required(),

                Forms\Components\RichEditor::make('jadwal_pelajaran')
                    ->label('Jadwal Pelajaran')
                    ->placeholder('Isi Jadwal Pelajaran')
                    ->required(),

                Forms\Components\RichEditor::make('format_nilai')
                    ->label('Format Nilai')
                    ->placeholder('Isi Format Nilai')
                    ->required(),

                Forms\Components\RichEditor::make('jadwal_ujian')
                    ->label('Jadwal Ujian')
                    ->placeholder('Isi Jadwal Ujian')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('Kurikulum')
                    ->label('Kurikulum')
                    ->getStateUsing(fn() => 'Halaman Kurikulum'),
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
            'index' => Pages\ListCurricula::route('/'),
            'create' => Pages\CreateCurriculum::route('/create'),
            'edit' => Pages\EditCurriculum::route('/{record}/edit'),
        ];
    }
}
