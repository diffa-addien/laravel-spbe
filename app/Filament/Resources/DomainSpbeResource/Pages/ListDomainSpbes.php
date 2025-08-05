<?php

namespace App\Filament\Resources\DomainSpbeResource\Pages;

use App\Filament\Resources\DomainSpbeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDomainSpbes extends ListRecords
{
    protected static string $resource = DomainSpbeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
