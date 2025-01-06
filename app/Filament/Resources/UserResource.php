<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    // prevent author to access this resourcess
    public static function canViewAny(): bool
    {
        return auth()->user()->role->name != "author";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // card
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\FileUpload::make('avatar')
                            ->label('Avatar')
                            ->directory('images') // This will store images in the 'storage/app/public/images' directory
                            ->disk('public') // Ensure the disk is set to 'public' as in your code
                            ->image() // This ensures only image files can be uploaded
                            ->required(),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Name')
                                    ->placeholder('Name')
                                    ->required(),

                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->placeholder('Email')
                                    ->required(),

                                Forms\Components\TextInput::make('password')
                                    ->label('Password')
                                    ->placeholder('Password')
                                    ->password()
                                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                    ->dehydrated(fn($state) => filled($state))
                                    ->required(fn(string $context): bool => $context === 'create'),

                                Forms\Components\TextInput::make('phone')
                                    ->label('Phone')
                                    ->placeholder('Phone')
                                    ->nullable(),

                                Forms\Components\TextInput::make('position')
                                    ->label('Position')
                                    ->placeholder('Position')
                                    ->required(),

                            ]),


                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('role_id')
                                    ->label('Role')
                                    ->relationship('role', 'name')
                                    ->required(),

                                Forms\Components\TextInput::make('level')
                                    ->label('Level')
                                    ->placeholder('Level')
                                    ->numeric()
                                    ->required(),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\ImageColumn::make('avatar')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\TextColumn::make('role.name'),
                Tables\Columns\TextColumn::make('level'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
