<?php

namespace App\Filament\Resources\StudentshipResource\Pages;

use App\Filament\Resources\StudentshipResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentship extends CreateRecord
{
    protected static string $resource = StudentshipResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
