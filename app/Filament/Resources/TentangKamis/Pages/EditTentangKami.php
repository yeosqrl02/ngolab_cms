<?php

namespace App\Filament\Resources\TentangKamis\Pages;

use App\Filament\Resources\TentangKamis\TentangKamiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTentangKami extends EditRecord
{
    protected static string $resource = TentangKamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
