<?php

namespace App\Filament\Resources\StudentshipResource\Pages;

use App\Filament\Resources\StudentshipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentships extends ListRecords
{
    protected static string $resource = StudentshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
