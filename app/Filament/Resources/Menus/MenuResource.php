<?php

namespace App\Filament\Resources\Menus;

use App\Filament\Resources\Menus\MenuResource\Pages;
use App\Models\Menu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Actions;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    // ✅ INI YANG BENAR UNTUK FILAMENT v4
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Menu';
    protected static ?string $recordTitleAttribute = 'nama_menu';

    /**
     * ================= FORM
     */
    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nama_menu')
                ->label('Nama Menu')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->label('Slug')
                ->helperText('Boleh dikosongkan, akan diisi otomatis')
                ->unique(ignoreRecord: true),

            Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name')
                ->required(),

            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(3),

            TextInput::make('harga')
                ->label('Harga'),

            FileUpload::make('gambar')
                ->label('Foto Menu')
                ->image()
                ->directory('berandas/menus')
                ->imageResizeTargetWidth(800)
                ->imageResizeTargetHeight(600)
                ->imagePreviewHeight('200')
                ->columnSpanFull()
                ->disk('public'),
        ]);
    }

    /**
     * ================= TABLE
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Foto')
                    ->disk('public'),

                Tables\Columns\TextColumn::make('nama_menu')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),

                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->numeric(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime(),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ]);
    }

    /**
     * ================= PAGES
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit'   => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
