<?php

namespace App\Filament\Resources\PublicRelationResource\Pages;

use App\Filament\Resources\PublicRelationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublicRelations extends ListRecords
{
    protected static string $resource = PublicRelationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
