<?php

namespace App\Filament\Resources\Artikels\ArtikelResource\Pages;

use App\Filament\Resources\Artikels\ArtikelResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\DeleteAction;

class EditArtikel extends EditRecord
{
    protected static string $resource = ArtikelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
