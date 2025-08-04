<?php

namespace App\Filament\Resources\IndeksSpbeResource\Pages;

use App\Filament\Resources\IndeksSpbeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndeksSpbe extends EditRecord
{
    protected static string $resource = IndeksSpbeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
