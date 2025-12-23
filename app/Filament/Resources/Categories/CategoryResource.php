<?php

namespace App\Filament\Resources\Categories;

use App\Filament\Resources\Categories\CategoryResource\Pages;
use App\Models\Category;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\TextInput;
use Filament\Actions;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    // ✅ WAJIB BEGINI DI FILAMENT v4
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?string $navigationLabel = 'Kategori';
    protected static ?string $recordTitleAttribute = 'name';

    /**
     * FORM
     */
    public static function form(Schema $schema): Schema
    {
            return $schema->components([
            TextInput::make('name')
                ->label('Nama Kategori')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->label('Slug')
                ->nullable()
                ->maxLength(255)
                ->helperText('Bisa dikosongkan, akan otomatis dibuat dari nama kategori'),
        ]);
    }

    /**
     * TABLE
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),

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
     * PAGES
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit'   => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
