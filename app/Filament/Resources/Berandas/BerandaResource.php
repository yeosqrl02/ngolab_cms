<?php

namespace App\Filament\Resources\Berandas;

use App\Filament\Resources\Berandas\Pages;
use App\Models\Beranda;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;

class BerandaResource extends Resource
{
    protected static ?string $model = Beranda::class;

    /**
     * ================= FORM (CRUD KONTEN)
     */
    public static function form(Schema $schema): Schema
    {
        return $schema->components([

            /* ================= HERO IMAGE ================= */
            Section::make('Hero Image')
                ->description('Atur foto hero halaman beranda')
                ->schema([
                    FileUpload::make('hero_image')
                        ->label('Foto Hero')
                        ->image()
                        ->disk('public')               // ✅ WAJIB
                        ->directory('beranda/hero')
                        ->imagePreviewHeight('200')
                        ->required(),
                ]),

            /* ================= PROMO ================= */
            Section::make('Promo')
                ->schema([
                    Repeater::make('promos')
                        ->label('Daftar Promo')
                        ->schema([
                            TextInput::make('title')
                                ->label('Judul Promo')
                                ->required(),

                            Textarea::make('subtitle')
                                ->label('Deskripsi Promo'),

                            TextInput::make('button_text')
                                ->label('Teks Tombol'),

                            FileUpload::make('image')
                                ->label('Gambar Promo')
                                ->image()
                                ->disk('public')       // ✅ WAJIB
                                ->directory('beranda/promo'),
                        ])
                        ->reorderable()
                        ->collapsible()
                        ->default([]),
                ]),

            /* ================= MENU POPULER ================= */
            Section::make('Menu Populer')
                ->schema([
                    Repeater::make('popular_menus')
                        ->label('Menu Populer')
                        ->schema([
                            TextInput::make('name')
                                ->label('Nama Menu')
                                ->required(),

                            Textarea::make('desc')
                                ->label('Deskripsi'),

                            TextInput::make('price')
                                ->label('Harga'),

                            FileUpload::make('image')
                                ->label('Foto Menu')
                                ->image()
                                ->disk('public')       // ✅ WAJIB
                                ->directory('beranda/menu'),
                        ])
                        ->reorderable()
                        ->collapsible()
                        ->default([]),
                ]),

            /* ================= TESTIMONI ================= */
            Section::make('Testimoni')
                ->schema([
                    Repeater::make('testimonials')
                        ->label('Testimoni Pelanggan')
                        ->schema([
                            TextInput::make('name')
                                ->label('Nama')
                                ->required(),

                            TextInput::make('product')
                                ->label('Produk'),

                            Select::make('rating')
                                ->label('Rating')
                                ->options([
                                    1 => '⭐',
                                    2 => '⭐⭐',
                                    3 => '⭐⭐⭐',
                                    4 => '⭐⭐⭐⭐',
                                    5 => '⭐⭐⭐⭐⭐',
                                ])
                                ->default(5),

                            Textarea::make('quote')
                                ->label('Komentar'),
                        ])
                        ->reorderable()
                        ->collapsible()
                        ->default([]),
                ]),
        ]);
    }

    /**
     * ================= TABLE
     */
    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('hero_image')->label('Hero'),
            Tables\Columns\TextColumn::make('updated_at')->label('Terakhir Diubah')->dateTime(),
        ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBerandas::route('/'),
            'edit'  => Pages\EditBeranda::route('/{record}/edit'),
        ];
    }
}
