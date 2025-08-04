<?php

namespace App\Filament\Resources\LayananAplikasiResource\Pages;

use App\Filament\Resources\LayananAplikasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLayananAplikasis extends ListRecords
{
    protected static string $resource = LayananAplikasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
