<?php

namespace App\Filament\Resources\TentangKamis\Pages;

use App\Filament\Resources\TentangKamis\TentangKamiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTentangKamis extends ListRecords
{
    protected static string $resource = TentangKamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
