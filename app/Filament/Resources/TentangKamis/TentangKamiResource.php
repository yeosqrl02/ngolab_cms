<?php

namespace App\Filament\Resources\TentangKamis;

use App\Filament\Resources\TentangKamis\Pages\CreateTentangKami;
use App\Filament\Resources\TentangKamis\Pages\EditTentangKami;
use App\Filament\Resources\TentangKamis\Pages\ListTentangKamis;
use App\Filament\Resources\TentangKamis\Schemas\TentangKamiForm;
use App\Filament\Resources\TentangKamis\Tables\TentangKamisTable;
use App\Models\TentangKami;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TentangKamiResource extends Resource
{
    protected static ?string $model = TentangKami::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return TentangKamiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TentangKamisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTentangKamis::route('/'),
            'create' => CreateTentangKami::route('/create'),
            'edit' => EditTentangKami::route('/{record}/edit'),
        ];
    }
}
