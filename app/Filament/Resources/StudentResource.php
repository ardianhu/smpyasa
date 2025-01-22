<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Imports\StudentsImport;
use App\Models\Student;
use App\Models\StudentClass;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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

    protected static ?string $navigationLabel = 'Siswa';

    protected static ?string $modelLabel = 'Peserta Didik';

    protected static ?string $pluralModelLabel = 'Siswa';

    protected static ?string $navigationGroup = 'Direktori';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')->required()->label('Nama Siswa'),
                // Forms\Components\Select::make('student_class_id')
                //     ->relationship('studentClass', 'full_name')
                //     ->required()
                //     ->label('Class'),
                Forms\Components\Select::make('student_class_id')
                    ->label('Class')
                    ->options(function () {
                        return \App\Models\StudentClass::all()->pluck('full_name', 'id');
                    })
                    ->nullable()
                    ->searchable()
                    ->placeholder('Select a class'),
                Forms\Components\TextInput::make('dob')->label('Tempat Tanggal Lahir'),
                Forms\Components\TextInput::make('nisn')->numeric()->label('NISN'),
                Forms\Components\TextInput::make('nis')->numeric()->label('NIS'),
                Forms\Components\TextInput::make('address')->label('Alamat'),
                Forms\Components\TextInput::make('father')->label('Nama Ayah'),
                Forms\Components\TextInput::make('mother')->label('Nama Ibu'),
                Forms\Components\TextInput::make('graduation_year')
                    ->label('Graduation Year')
                    ->numeric()
                    ->placeholder('Masukkan tahun lulus')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                // Show the related class full name
                Tables\Columns\TextColumn::make('studentClass.full_name')
                    ->label('Kelas'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('Import Students')
                    ->action(function (array $data) {
                        // Get the full file path
                        $filePath = storage_path('app/' . $data['file']);

                        if (file_exists($filePath)) {
                            // Import the file
                            Excel::import(new StudentsImport($data['student_class_id'],  $data['graduation_year']), $filePath);
                        } else {
                            throw new \Exception("File [{$data['file']}] does not exist and can therefore not be imported.");
                        }
                    })
                    ->form([
                        Select::make('student_class_id')
                            ->label('Select Class')
                            ->options(StudentClass::all()->pluck('full_name', 'id'))
                            ->nullable(),
                        Forms\Components\TextInput::make('graduation_year')
                            ->label('Graduation Year')
                            ->numeric()
                            ->placeholder('Masukkan tahun lulus')
                            ->nullable(),
                        FileUpload::make('file')
                            ->label('Upload Excel File')
                            ->disk('local') // Ensure the disk is correctly configured
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'])
                            ->required(),
                    ])
                    ->requiresConfirmation()
                    ->label('Import Students')
                    ->authorize(function () {
                        return auth()->user()->role->name !== 'default';
                    })

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                BulkAction::make('Promote All Students')
                    ->action(function () {
                        $studentClasses = StudentClass::all();

                        $currentYear = now()->year;

                        foreach ($studentClasses as $class) {
                            $newLevel = match ($class->name) {
                                'VII' => 'VIII',
                                'VIII' => 'IX',
                                'IX' => 'Lulus',
                                default => null,
                            };

                            if ($newLevel) {
                                // Generate new class name and ensure it exists
                                $nextClass = $newLevel === 'Lulus'
                                    ? null
                                    : StudentClass::firstOrCreate([
                                        'name' => $newLevel,
                                        'sub' => $class->sub,
                                    ]);

                                // Update students to the new class
                                $class->student()->update([
                                    'student_class_id' => $nextClass?->id, // Null for Lulus
                                    'graduation_year' => $newLevel === 'Lulus' ? $currentYear : null,
                                ]);
                            }
                        }
                    })
                    ->requiresConfirmation()
                    ->label('Promote All Students')
                    ->authorize(function () {
                        return auth()->user()->role->name !== 'default';
                    }),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
