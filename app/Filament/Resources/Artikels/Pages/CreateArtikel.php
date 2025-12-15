<?php

namespace App\Filament\Resources\Artikels\ArtikelResource\Pages;

use App\Filament\Resources\Artikels\ArtikelResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateArtikel extends CreateRecord
{
    protected static string $resource = ArtikelResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = Auth::id();
        return $data;
    }
}
