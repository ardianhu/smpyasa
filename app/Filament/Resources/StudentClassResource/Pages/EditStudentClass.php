<?php

namespace App\Filament\Resources\StudentClassResource\Pages;

use App\Filament\Resources\StudentClassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentClass extends EditRecord
{
    protected static string $resource = StudentClassResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
