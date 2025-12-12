<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(2)->schema([
                TextInput::make('nama_menu')
                    ->label('Nama Menu')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('Slug')
                    ->nullable()
                    ->maxLength(255),
            ]),

            Grid::make(2)->schema([
                TextInput::make('kategori')
                    ->label('Kategori')
                    ->nullable(),

                TextInput::make('harga')
                    ->label('Harga')
                    ->nullable(),
            ]),

            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(4)
                ->nullable(),

            FileUpload::make('gambar')
                ->label('Foto Menu')
                ->image()
                ->disk('public')
                ->directory('menus')
                ->nullable(),
        ]);
    }
}
