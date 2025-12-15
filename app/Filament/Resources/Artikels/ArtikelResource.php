<?php

namespace App\Filament\Resources\Artikels;

use App\Filament\Resources\Artikels\ArtikelResource\Pages;
use App\Models\Artikel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;
    protected static ?string $navigationLabel = 'Artikel';
    protected static ?string $recordTitleAttribute = 'judul';

    /**
     * =========================
     * FORM
     * =========================
     */
    public static function form(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('judul')
                ->label('Judul Artikel')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, callable $set, $get) {
                    if (! $get('slug')) {
                        $set('slug', str($state)->slug());
                    }
                }),

            TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->unique(ignoreRecord: true)
                ->helperText('Digunakan sebagai URL artikel'),

            // 🔥 AUTHOR DIKETIK MANUAL
            TextInput::make('author')
                ->label('Penulis')
                ->placeholder('Nama penulis')
                ->required(),

            TextInput::make('kategori')
                ->label('Kategori')
                ->placeholder('Tips, Resep, Wawasan'),

            TextInput::make('waktu_baca')
                ->label('Waktu Baca')
                ->placeholder('5 menit'),

            DateTimePicker::make('tanggal_publish')
                ->label('Tanggal Publish')
                ->seconds(false)
                ->default(now())
                ->required(),

            Textarea::make('excerpt')
                ->label('Ringkasan (Excerpt)')
                ->rows(4)
                ->helperText('Tampil di halaman daftar artikel'),

            RichEditor::make('konten')
                ->label('Isi Artikel')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('thumbnail')
                ->label('Thumbnail Artikel')
                ->image()
                ->directory('artikels')
                ->imagePreviewHeight('200')
                ->columnSpanFull(),
        ]);
    }

    /**
     * =========================
     * TABLE
     * =========================
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->square(),

                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge(),

                // 🔥 AUTHOR STRING
                TextColumn::make('author')
                    ->label('Penulis')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tanggal_publish')
                    ->label('Publish')
                    ->dateTime('d M Y, H:i'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i'),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ]);
    }

    /**
     * =========================
     * PAGES
     * =========================
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit'   => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }
}
