<?php

namespace App\Filament\Resources\Berandas\Pages;

use App\Filament\Resources\Berandas\BerandaResource;
use Filament\Resources\Pages\EditRecord;

class EditBeranda extends EditRecord
{
    protected static string $resource = BerandaResource::class;

    /**
     * Hilangkan tombol Delete (karena Beranda 1 data)
     */
    protected function getHeaderActions(): array
    {
        return [];
    }
}
