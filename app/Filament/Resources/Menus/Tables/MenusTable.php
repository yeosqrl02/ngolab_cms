<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_menu')
                    ->label('Nama Menu')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('category.name') // ambil nama kategori via relasi
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->money('idr', true)
                    ->sortable(),

                ImageColumn::make('gambar')
                    ->label('Foto')
                    ->disk('public')
                    ->directory('menus'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
