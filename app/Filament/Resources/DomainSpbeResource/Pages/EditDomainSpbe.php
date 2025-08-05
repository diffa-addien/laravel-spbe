<?php

namespace App\Filament\Resources\DomainSpbeResource\Pages;

use App\Filament\Resources\DomainSpbeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDomainSpbe extends EditRecord
{
    protected static string $resource = DomainSpbeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
