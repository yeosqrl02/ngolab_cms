<?php

namespace App\Filament\Resources\Artikels\ArtikelResource\Pages;

use App\Filament\Resources\Artikels\ArtikelResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListArtikels extends ListRecords
{
    protected static string $resource = ArtikelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'tanggal_publish';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }
}
