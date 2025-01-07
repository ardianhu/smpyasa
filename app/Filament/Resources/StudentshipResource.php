<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentshipResource\Pages;
use App\Filament\Resources\StudentshipResource\RelationManagers;
use App\Models\Studentship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentshipResource extends Resource
{
    protected static ?string $model = Studentship::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Kesiswaan';

    protected static ?string $modelLabel = 'Kesiswaan';

    protected static ?string $pluralModelLabel = 'Kesiswaan';

    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\RichEditor::make('tentang_kesiswaan')
                    ->label('Tentang Kesiswaan')
                    ->placeholder('Isi Tentang Kesiswaan')
                    ->required(),

                Forms\Components\RichEditor::make('ekstrakurikuler')
                    ->label('Ekstrakurikuler')
                    ->placeholder('Isi Ekstrakurikuler')
                    ->required(),

                Forms\Components\RichEditor::make('program_kerja_osis')
                    ->label('Program Kerja Osis')
                    ->placeholder('Isi Program Kerja Osis')
                    ->required(),

                Forms\Components\RichEditor::make('kegiatan_osis')
                    ->label('Kegiatan Osis')
                    ->placeholder('Isi Kegiatan Osis')
                    ->required(),

                Forms\Components\RichEditor::make('daftar_nama_siswa')
                    ->label('Daftar Nama Siswa')
                    ->placeholder('Isi Daftar Nama Siswa')
                    ->required(),

                Forms\Components\RichEditor::make('p5')
                    ->label('P5')
                    ->placeholder('Isi P5')
                    ->required(),

                Forms\Components\RichEditor::make('tata_tertib_siswa')
                    ->label('Tata Tertib Siswa')
                    ->placeholder('Isi Tata Tertib Siswa')
                    ->required(),

                Forms\Components\RichEditor::make('bp-bk')
                    ->label('BP/BK')
                    ->placeholder('Isi BP/BK')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('Kesiswaan')
                    ->label('Kesiswaan')
                    ->getStateUsing(fn() => 'Halaman Kesiswaan'),
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
            'index' => Pages\ListStudentships::route('/'),
            'create' => Pages\CreateStudentship::route('/create'),
            'edit' => Pages\EditStudentship::route('/{record}/edit'),
        ];
    }
}
