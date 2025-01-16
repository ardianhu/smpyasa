<?php

namespace App\Filament\Resources\PublicRelationResource\Pages;

use App\Filament\Resources\PublicRelationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPublicRelation extends EditRecord
{
    protected static string $resource = PublicRelationResource::class;

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
