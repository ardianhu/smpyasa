<?php

namespace App\Filament\Resources\PublicRelationResource\Pages;

use App\Filament\Resources\PublicRelationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePublicRelation extends CreateRecord
{
    protected static string $resource = PublicRelationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
