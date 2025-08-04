<?php

namespace App\Filament\Resources\IndeksSpbeResource\Pages;

use App\Filament\Resources\IndeksSpbeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndeksSpbes extends ListRecords
{
    protected static string $resource = IndeksSpbeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
