<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfoResource\Pages;
use App\Filament\Resources\InfoResource\RelationManagers;
use App\Models\Info;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfoResource extends Resource
{
    protected static ?string $model = Info::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('about')
                            ->label('Tentang Sekolah')
                            ->nullable()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')
                            ->label('Telpon')
                            ->nullable()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->nullable()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('address')
                            ->label('Alamat')
                            ->nullable(),

                        Forms\Components\Repeater::make('visi')
                            ->label('Visi')
                            ->schema([
                                Forms\Components\Textarea::make('value')
                                    ->label('Visi')
                                    ->required(),
                            ])
                            ->columns(1) // Display one item per row
                            ->createItemButtonLabel('Tambah Visi')
                            ->nullable(),

                        Forms\Components\Repeater::make('misi')
                            ->label('Misi')
                            ->schema([
                                Forms\Components\Textarea::make('value')
                                    ->label('Misi')
                                    ->required(),
                            ])
                            ->columns(1) // Display one item per row
                            ->createItemButtonLabel('Tambah Misi')
                            ->nullable(),

                        Forms\Components\Repeater::make('tujuan')
                            ->label('Tujuan')
                            ->schema([
                                Forms\Components\Textarea::make('value')
                                    ->label('Tujuan')
                                    ->required(),
                            ])
                            ->columns(1) // Display one item per row
                            ->createItemButtonLabel('Tambah Tujuan')
                            ->nullable(),


                        Forms\Components\Textarea::make('sambutan_kasek')
                            ->label('Sambutan Kasek')
                            ->nullable(),

                        Forms\Components\TextInput::make('youtube_link')
                            ->label('YouTube Link')
                            ->url()
                            ->nullable()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('facebook_link')
                            ->label('Facebook Link')
                            ->url()
                            ->nullable()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('instagram_link')
                            ->label('Instagram Link')
                            ->url()
                            ->nullable()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('twitter_link')
                            ->label('Twitter Link')
                            ->url()
                            ->nullable()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('tiktok_link')
                            ->label('Tiktok Link')
                            ->url()
                            ->nullable()
                            ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('about')
                    ->label('About')
                    ->limit(50), // Limit text length for better display

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),

                Tables\Columns\TextColumn::make('address')
                    ->label('Address')
                    ->limit(50),
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
            'index' => Pages\ListInfos::route('/'),
            'create' => Pages\CreateInfo::route('/create'),
            'edit' => Pages\EditInfo::route('/{record}/edit'),
        ];
    }
}
