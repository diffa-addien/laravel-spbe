<?php

namespace App\Filament\Resources\LayananAplikasiResource\Pages;

use App\Filament\Resources\LayananAplikasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLayananAplikasi extends EditRecord
{
    protected static string $resource = LayananAplikasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
