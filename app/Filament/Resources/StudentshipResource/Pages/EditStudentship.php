<?php

namespace App\Filament\Resources\StudentshipResource\Pages;

use App\Filament\Resources\StudentshipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentship extends EditRecord
{
    protected static string $resource = StudentshipResource::class;

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
