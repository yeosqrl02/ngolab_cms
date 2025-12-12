<?php

namespace App\Filament\Resources\Berandas\Pages;

use App\Filament\Resources\Berandas\BerandaResource;
use App\Models\Beranda;
use Filament\Resources\Pages\ListRecords;

class ListBerandas extends ListRecords
{
    protected static string $resource = BerandaResource::class;

    public function mount(): void
    {
        parent::mount();

        // pastikan selalu ada 1 data beranda
        $beranda = Beranda::firstOrCreate([]);

        // langsung redirect ke halaman edit
        $this->redirect(
            BerandaResource::getUrl('edit', ['record' => $beranda])
        );
    }
}
